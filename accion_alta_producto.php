<?php	
	session_start();
		$nuevoProducto["nombre"] = $_POST["nombre"];
		$nuevoProducto["preciounitario"] = $_POST["preciounitario"];

		$_SESSION["formulario"] = $nuevoProducto;
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$preciounitario = str_replace(".",",",$preciounitario);

		$conexion = crearConexionBD();
		$excepcion = alta_producto($conexion, 0, $nuevoProducto["nombre"],0,$nuevoProducto["preciounitario"],1);
		cerrarConexionBD($conexion);
			
		if ($excepcion!= null) {
			$exception= "El error está en la funcion crear";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "alta_producto.php";
			Header("Location: exception.php");
		}
		else{
			Header("Location: admin_productos.php");
		}

	
?>