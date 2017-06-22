<?php	
	session_start();	
	if(isset($_POST["submit"])){
	if (isset($_SESSION["PRODUCTO"])) {
		$producto = $_SESSION["PRODUCTO"];
		unset($_SESSION["PRODUCTO"]);
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$stockmod = $_POST["stockmod"];
		$stockmod = str_replace(".",",",$stockmod);

		$conexion = crearConexionBD();		
		$excepcion = modificar_stock($conexion,$producto["OID_P"], $stockmod);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "Formato de entrada no válido";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "almacen.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: almacen.php");
		
	} 
	else Header("Location: almacen.php"); // Se ha tratado de acceder directamente a este PHP
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Modificación del stock </title>
</head>

<body>


<main>

	<div class="margenTop"></div>
	
	<!-- The HTML login form -->
	<form action="accion_modificar_stock.php" method="post">
		<label class="textoRegistro">Stock actual:<input type="number" name="stockmod" id="stockmod" /></label><br>
		<label class="textoRegistro"><input type="submit" name="submit" value="submit" /></label>
	</form>
</main>
</body>
</html>