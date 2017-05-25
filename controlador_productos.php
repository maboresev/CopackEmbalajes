<?php

	session_start();

		if(isset($_REQUEST["OID_P"])){
			$producto["OID_P"]=$_REQUEST["OID_P"];
			$producto["NOMBRE"]=$_REQUEST["NOMBRE"];
			$producto["STOCK"]=$_REQUEST["STOCK"];
			$producto["PRECIO"]=$_REQUEST["PRECIOUNITARIO"];
			$producto["OID_UAL"]=$_REQUEST["OID_UAL"];
			$producto["MATERIAL"]=$_REQUEST["MATERIAL"];
			$producto["MEDIDAS"]=$_REQUEST["MEDIDAS"];
			$producto["CANAL"]=$_REQUEST["CANAL"];
			$preciomod = $_POST["preciomod"];

		
		$_SESSION["PRODUCTO"]=$producto;
		
		if (isset($_REQUEST["editar"])) Header("Location: accion_modificar_producto.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_producto.php");
		else if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_producto.php"); 
		}
		
		else{
			header("location:muestra_productos.php");
		}
?>
