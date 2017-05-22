<?php

 function insertaCliente($conexion,$usuario) {

	try {
		$consulta = "CALL ALTA_CLIENTE(:oidc, :nombre, :apellidos, :email, :password, :empresa)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':oidc',$usuario["oidc"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':apellidos',$usuario["apellidos"]);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':password',$usuario["password"]);
		$stmt->bindParam(':empresa',$usuario["empresa"]);
		$stmt->execute();
		return true;
	} catch(PDOException $e) {
		return false;
		$e->getMessage();
    }
}

?>