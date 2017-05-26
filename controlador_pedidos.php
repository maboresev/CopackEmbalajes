<?php

	session_start();

		if(isset($_REQUEST["NUM_PEDIDO"])){
			$pedido["NUM_PEDIDO"]=$_REQUEST["NUM_PEDIDO"];
			$pedido["FECHA_PEDIDO"]=$_REQUEST["FECHA_PEDIDO"];
			$pedido["OID_C"]=$_REQUEST["OID_C"];
			$pedido["OID_P"]=$_REQUEST["OID_P"];
			$pedido["CANTIDADPEDIDA"]=$_REQUEST["CANTIDADPEDIDA"];
			$pedido["NOMBRE"]=$_REQUEST["NOMBRE"];
			

		
		$_SESSION["PEDIDO"]=$pedido;
		
		/*if (isset($_REQUEST["editar"])) Header("Location: accion_modificar_producto.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_producto.php");
		else if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_producto.php"); */
		}
		
		else{
			header("location:mis_pedidos.php");
		}


?>