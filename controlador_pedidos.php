<?php

	session_start();

		if(isset($_REQUEST["NUM_PEDIDO"])){
			$pedido["NUM_PEDIDO"]=$_REQUEST["NUM_PEDIDO"];
			

		
		$_SESSION["PEDIDO"]=$pedido;
		
		if (isset($_REQUEST["confirmar_pedido"])) Header("Location: accion_confirmar_pedido.php"); 

		}
		
		else{
			header("Location: mis_pedidos.php");
		}


?>