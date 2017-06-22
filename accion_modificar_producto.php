<?php	
	session_start();	
	if(isset($_POST["submit"])){
	if (isset($_SESSION["PRODUCTO"])) {
		$producto = $_SESSION["PRODUCTO"];
		unset($_SESSION["PRODUCTO"]);
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$preciomod = $_POST["preciomod"];
		$preciomod = str_replace(".",",",$preciomod);

		$conexion = crearConexionBD();		
		$excepcion = modificar_precio_producto($conexion,$producto["OID_P"], $preciomod);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion modificar";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "admin_productos.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: admin_productos.php");
		
	} 
	else Header("Location: admin_productos.php"); // Se ha tratado de acceder directamente a este PHP
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
	<form action="accion_modificar_producto.php" method="post">
		<label class="textoRegistro">Nuevo precio:<input type="number" step="0.01" name="preciomod" id="preciomod" /></label> <br>
		<label class="textoRegistro"><input type="submit" name="submit" value="submit" /></label>
	</form>
</main>
</body>
</html>