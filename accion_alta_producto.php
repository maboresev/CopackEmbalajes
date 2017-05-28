<?php	
	session_start();

	if (isset($_SESSION["formulario"])) {
		$nuevoProducto["oidp"] = $_REQUEST["oidp"];
		$nuevoProducto["nombre"] = $_REQUEST["nombre"];
		$nuevoProducto["preciounitario"] = $_REQUEST["preciounitario"];
		$nuevoProducto["oid_ual"] = $_REQUEST["oid_ual"];
		$nuevoProducto["stock"] = $_REQUEST["stock"];
	}
	else 
		Header("Location: alta_usuario.php");	
	
		$_SESSION["formulario"] = $nuevoProducto;
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$conexion = crearConexionBD();	
		$excepcion = alta_producto($conexion, $nuevoProducto);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion crear";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "alta_producto.php";
			Header("Location: exception.php");
		}
		else{
			Header("Location: exito_alta_producto.php");
		}

	
?>