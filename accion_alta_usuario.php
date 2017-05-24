﻿<?php
	session_start();

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
		$nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
		$nuevoUsuario["password"] = $_REQUEST["password"];
		$nuevoUsuario["confirm"] = $_REQUEST["passwordconf"];
		$nuevoUsuario["email"] = $_REQUEST["email"];
		$nuevoUsuario["empresa"] = $_REQUEST["empresa"];
		$nuevoUsuario["oidc"] = $_REQUEST["oidc"];
	}
	else // En caso contrario, vamos al formulario
		Header("Location: login.php");

	// Guardar la variable local con los datos del formulario en la sesión.
	$_SESSION["formulario"] = $nuevoUsuario;

	// Validamos el formulario en servidor 
	$errores = validarDatosUsuario($nuevoUsuario);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location:register.php');
	} else
		// Si todo va bien, vamos a la página de éxito (inserción del usuario en la base de datos)

		Header('Location: exito_alta_usuario.php');
	///////////////////////////////////////////////////////////
	// Validación en servidor del formulario de alta de usuario
	///////////////////////////////////////////////////////////
	function validarDatosUsuario($nuevoUsuario){

		// Validación del Nombre			
		if($nuevoUsuario["nombre"]=="") 
			$errores[] = "<p>El nombre no puede estar vacío</p>";
	
		// Validación del email
		if($nuevoUsuario["email"]==""){ 
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($nuevoUsuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $nuevoUsuario["email"]. "</p>";
		}
		
		
		// Validación de la password
		if(!isset($nuevoUsuario["password"]) || strlen($nuevoUsuario["password"])<8){
			$errores [] = "<p>password no válida: debe tener al menos 8 caracteres</p>";
		}else if(!preg_match("/[a-z]+/", $nuevoUsuario["password"]) || 
			!preg_match("/[A-Z]+/", $nuevoUsuario["password"]) || !preg_match("/[0-9]+/", $nuevoUsuario["password"])){
			$errores[] = "<p>password no válida: debe contener letras mayúsculas y minúsculas y números</p>";
		}else if($nuevoUsuario["password"] != $nuevoUsuario["confirm"]){
			$errores[] = "<p>La confirmación de password no coincide con la password</p>";
		}
	
		return $errores;
	}
	


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión de Usuarios: Alta de usuario</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>