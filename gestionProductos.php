<?php
	/* Funciones de gestion de productos */
	function consultarTodosProductos($conexion) {
	$consulta = "SELECT * FROM PRODUCTO, MASTERMAT"
		. " WHERE (PRODUCTO.OID_P = MASTERMAT.OID_P)"
		. " ORDER BY NOMBRE";
    return $conexion->query($consulta);
	}
?>