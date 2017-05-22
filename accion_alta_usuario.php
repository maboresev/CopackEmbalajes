<?php
	session_start();

	// Comprobar que hemos llegado a esta p�gina porque se ha rellenado el formulario
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

	// Guardar la variable local con los datos del formulario en la sesi�n.
	$_SESSION["formulario"] = $nuevoUsuario;

	// Validamos el formulario en servidor 
	$errores = validarDatosUsuario($nuevoUsuario);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesi�n los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location:register.php');
	} else
		// Si todo va bien, vamos a la p�gina de �xito (inserci�n del usuario en la base de datos)

		Header('Location: exito_alta_usuario.php');
	///////////////////////////////////////////////////////////
	// Validaci�n en servidor del formulario de alta de usuario
	///////////////////////////////////////////////////////////
	function validarDatosUsuario($nuevoUsuario){

		// Validaci�n del Nombre			
		if($nuevoUsuario["nombre"]=="") 
			$errores[] = "<p>El nombre no puede estar vac�o</p>";
	
		// Validaci�n del email
		if($nuevoUsuario["email"]==""){ 
			$errores[] = "<p>El email no puede estar vac�o</p>";
		}else if(!filter_var($nuevoUsuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $nuevoUsuario["email"]. "</p>";
		}
		
		
		// Validaci�n de la password
		if(!isset($nuevoUsuario["password"]) || strlen($nuevoUsuario["password"])<8){
			$errores [] = "<p>password no v�lida: debe tener al menos 8 caracteres</p>";
		}else if(!preg_match("/[a-z]+/", $nuevoUsuario["password"]) || 
			!preg_match("/[A-Z]+/", $nuevoUsuario["password"]) || !preg_match("/[0-9]+/", $nuevoUsuario["password"])){
			$errores[] = "<p>password no v�lida: debe contener letras may�sculas y min�sculas y n�meros</p>";
		}else if($nuevoUsuario["password"] != $nuevoUsuario["confirm"]){
			$errores[] = "<p>La confirmaci�n de password no coincide con la password</p>";
		}
	
		return $errores;
	}
	


?>

