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
		$session;
    }
 }
	
	function consultarClientes($conexion, $email, $password){
		$consulta = "SELECT COUNT(*) AS TOTAL FROM CLIENTE WHERE CORREOELECTRONICO=:email AND PASS=:password";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	function consultarAdministracion($conexion, $email, $password){
		$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIO_ADMINISTRACION WHERE CORREOELECTRONICO=:email AND PASS=:password";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	function consultarAlmacen($conexion, $email, $password){
		$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIO_ALMACEN WHERE CORREOELECTRONICO=:email AND PASS=:password";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	function consultarMantenimiento($conexion, $email, $password){
		$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIO_MANTENIMIENTO WHERE CORREOELECTRONICO=:email AND PASS=:password";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		return $stmt->fetchColumn();
	}


?>