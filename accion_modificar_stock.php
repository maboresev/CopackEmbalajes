<?php	
	session_start();	
	
	if (isset($_SESSION["PRODUCTO"])) {
		$producto = $_SESSION["PRODUCTO"];
		unset($_SESSION["PRODUCTO"]);
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = modificar_stock($conexion,$producto["OID_P"],$producto["STOCK"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "admin_productos.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: admin_productos.php");
	} 
	else Header("Location: admin_productos.php"); // Se ha tratado de acceder directamente a este PHP
?>
