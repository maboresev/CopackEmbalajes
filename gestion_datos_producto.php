<?php
	require_once("gestionBD.php");

	if(isset($_GET["OID_P"])){
		
		$conexion=crearConexionBD();
		echo "informacion del producto";
		
		echo "Material: ".$_SESSION["MATERIAL"].". ";
		echo "Medidas: ".$_SESSION["MEDIDAS"].". ";
		echo "Canal: ".$_SESSION["CANAL"].". ";
		echo "Stock en almacén: ".$_SESSION["STOCK"].". ";
		
		cerrarConexionBD($conexion);
		unset($_GET["OID_P"]);
	}


?>