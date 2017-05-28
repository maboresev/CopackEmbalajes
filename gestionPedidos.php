<?php


function confirmar_pedido($conexion,$numpedido, $carrito) {
	try {
		$stmt=$conexion->prepare('CALL actualiza_pedido_carrito(:numpedido,:carrito)');
		$stmt->bindParam(':numpedido',$numpedido);
		$stmt->bindParam(':carrito',$carrito);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_lineas_pedido($conexion,$NUMPEDIDO) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_LINEAS_PEDIDO(:numpedido)');
		$stmt->bindParam(':numpedido',$NUMPEDIDO);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function quitar_pedido($conexion,$NUMPEDIDO) {
	try {
		$stmt=$conexion->prepare('CALL QUITAR_PEDIDO(:numpedido)');
		$stmt->bindParam(':numpedido',$NUMPEDIDO);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function nuevo_pedido($conexion,$NUMPEDIDO, $oid_c, $carrito) {
	try {
		$stmt=$conexion->prepare('CALL inserta_pedido(:numpedido, :oid_c, :carrito)');
		$stmt->bindParam(':numpedido',$NUMPEDIDO);
		$stmt->bindParam(':oid_c',$oid_c);
		$stmt->bindParam(':carrito',$carrito);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

?>