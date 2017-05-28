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

?>