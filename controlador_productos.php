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
		
		$_SESSION["PRODUCTO"]=$producto;
		}
		
		else{
			header("location:muestra_productos.php");
		}
?>
