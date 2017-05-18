<?php
	/* Funciones de gestion de productos */
	function consultarTodosProductos($conexion) {
	$consulta = "SELECT * FROM PRODUCTO, MASTERMAT"
		. " WHERE (PRODUCTO.OID_P = MASTERMAT.OID_P)"
		. " ORDER BY NOMBRE";
    return $conexion->query($consulta);
	}


function quitar_producto($conexion,$OidP) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_PRODUCTO(:OidP)');
		$stmt->bindParam(':OidP',$OidP);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_producto($conexion,$OidP,$NuevoProducto) {
	try {
		$stmt=$conexion->prepare('CALL MODIFICAR_PRODUCTO(:OidP,:NuevoProducto)');
		$stmt->bindParam(':OidP',$OidP);
		$stmt->bindParam(':NuevoProducto',$NuevoProducto);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
?>