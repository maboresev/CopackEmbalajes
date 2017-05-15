<?php
	require_once("gestionBD.php");

	if(isset($_GET["OID_P"])){
		
		$conexion=crearConexionBD();
		echo "informacion del producto";
		
		cerrarConexionBD($conexion);
		unset($_GET["OID_P"]);
	}


?>