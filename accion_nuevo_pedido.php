<?php	
	session_start();	
	if (isset($_SESSION["PEDIDO"])) {
		$pedido = $_SESSION["PEDIDO"];
		unset($_SESSION["pedido"]);
		
		require_once("gestionBD.php");
		require_once("gestionPedidos.php");
		
		$conexion = crearConexionBD();	
		$excepcion = nuevo_pedido($conexion, $pedido["NUM_PEDIDO"], $pedido["OID_C"], 'SI');
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion crear";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "carrito.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: carrito.php");
		
	} 