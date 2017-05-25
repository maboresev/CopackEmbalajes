<?php
	/* Funciones de gestion de productos */
	function consultarTodosProductos($conexion) {
	$consulta = "SELECT * FROM PRODUCTO, MASTERMAT"
		. " WHERE (PRODUCTO.OID_P = MASTERMAT.OID_P)"
		. " ORDER BY NOMBRE";
    return $conexion->query($consulta);
	}


function quitar_producto($conexion,$oidp) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_PRODUCTO(:oidp)');
		$stmt->bindParam(':oidp',$oidp);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_stock($conexion,$OidP,$NuevoProducto) {
	try {
		$stmt=$conexion->prepare('CALL ACTUALIZA_STOCK(:OidP,:NuevoProducto)');
		$stmt->bindParam(':OidP',$OidP);
		$stmt->bindParam(':NuevoProducto',$NuevoProducto);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_precio_producto($conexion,$OidP,$NuevoProducto) {
	try {
		$stmt=$conexion->prepare('CALL ACTUALIZA_PRECIO_PRODUCTO(:OidP,:NuevoProducto)');
		$stmt->bindParam(':OidP',$OidP);
		$stmt->bindParam(':NuevoProducto',$NuevoProducto);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function modificar_master($conexion,$OidP,$NuevoProducto) {
	try {
		$stmt=$conexion->prepare('CALL ACTUALIZA_MASTER_PRODUCTO(:OidP,:NuevoProducto)');
		$stmt->bindParam(':OidP',$OidP);
		$stmt->bindParam(':NuevoProducto',$NuevoProducto);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
?>