<?php	
	session_start();

	if (isset($_SESSION["formulario"])) {
		$nuevoProducto = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: alta_usuario.php");	
	
		$_SESSION["formulario"] = $nuevoProducto;
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$conexion = crearConexionBD();	
		$excepcion = alta_producto($conexion, $producto);
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