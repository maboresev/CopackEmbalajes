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
			$exception= "El error está en la funcion modificar";
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
</head>

<body>


<main>

	
	<!-- The HTML login form -->
	<form action="accion_modificar_stock.php" method="post">
		<div>Stock actual:<input type="number" name="stockmod" id="stockmod" /></div>
		<input type="submit" name="submit" value="submit" />
	</form>
</main>
</body>
</html>