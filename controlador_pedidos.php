<?php

	session_start();

		if(isset($_REQUEST["NUM_PEDIDO"]))
			$pedido["NUM_PEDIDO"]=$_REQUEST["NUM_PEDIDO"];
			$pedido["OID_C"]=$_REQUEST["OID_C"];

		
		$_SESSION["PEDIDO"]=$pedido;
		
	
			if (isset($_REQUEST["confirmar_pedido"])) Header("Location: accion_confirmar_pedido.php"); 
		else if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_pedido.php");
		else if (isset($_REQUEST["nuevo_pedido"])) Header("Location: accion_nuevo_pedido.php");

		
		else{
			header("Location: carrito.php");
		}


?>