<?php

	session_start();
	
		if(isset($_REQUEST["OID_P"])){
			$producto["oid_p"]=$_REQUEST["OID_P"];
			$producto["nombre"]=$_REQUEST["NOMBRE"];
			$producto["stock"]=$_REQUEST["STOCK"];
			$producto["precio"]=$_REQUEST["PRECIOUNITARIO"];
			$producto["oid_ual"]=$_REQUEST["OID_UAL"];
		
		$_SESSION["PRODUCTO"]=$producto;
		}
		
		else{
			header("location:muestra_productos.php");
		}
?>
