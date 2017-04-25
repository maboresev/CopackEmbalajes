<?php
	/* Funciones de gestion de productos */
	function consultarTodosProductos($conexion) {
	$consulta = "SELECT * FROM PRODUCTO, MASTERMAT"
		. " WHERE (PRODUCTO.OID_P = MASTERMAT.OID_P)"
		. " ORDER BY NOMBRE";
		
	try {
	    return $conexion->query($consulta);
	}catch(PDOException $e){
		$_SESSION['exception'] = $e->GetMessage();
		header("Location: exception.php");
	}	
}
?>