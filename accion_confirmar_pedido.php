<?php	
	session_start();	
	if (isset($_SESSION["PEDIDO"])) {
		$pedido = $_SESSION["PEDIDO"];
		unset($_SESSION["pedido"]);
		
		require_once("gestionBD.php");
		require_once("gestionPedidos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = confirmar_pedido($conexion,$pedido["NUM_PEDIDO"], "NO");
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion modificar";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "carrito.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: carrito.php");
		
	} 

?>