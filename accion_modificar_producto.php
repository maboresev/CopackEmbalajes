<?php	
	session_start();	
	
	if (isset($_SESSION["PRODUCTO"])) {
		$producto = $_SESSION["PRODUCTO"];
		unset($_SESSION["PRODUCTO"]);
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = modificar_precio_producto($conexion,$producto["OID_P"], $_POST["preciomod"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion modificar" + $_POST["preciomod"];
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "admin_productos.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: admin_productos.php");
	} 
	else Header("Location: admin_productos.php"); // Se ha tratado de acceder directamente a este PHP
?>
