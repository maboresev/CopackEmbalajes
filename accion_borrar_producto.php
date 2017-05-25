<?php	
	session_start();	
	
	if (isset($_SESSION["PRODUCTO"])) {
		$producto = $_SESSION["PRODUCTO"];
		unset($_SESSION["PRODUCTO"]);
		
		require_once("gestionBD.php");
		require_once("gestionProductos.php");
		
		$conexion = crearConexionBD();
		$excepcion = quitar_producto($conexion,$producto["OID_P"]);
		cerrarConexionBD($conexion);
		// CREAR LA CONEXIÓN A LA BASE DE DATOS
		// INVOCAR "QUITAR_TITULO"
		// CERRAR LA CONEXIÓN
		
		if($excepcion == ""){
			header("location:admin_productos.php");
		}
		else{
			$exception="El producto que intenta borrar referencia alguna línea de factura o de pedido abierta.";
			$_SESSION["exception"]=$exception;
			$_SESSION["destino"] = "admin_productos.php";
			header("location:exception.php");
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// EN OTRO CASO, VOLVER A "CONSULTA_LIBROS.PHP"

	}
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: admin_productos.php"); 
?>
