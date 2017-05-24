<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$formulario['nombre'] = "";
		$formulario['apellidos'] = "";
		$formulario['password'] = "";
		$formulario['confirm'] = "";
		$formulario['email'] = "";
		$formulario['empresa'] = "";
		$formulario['oidc'] = "";
	
		$_SESSION['formulario'] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION['formulario'];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión de Usuarios: Formulario de registro</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="topLogin">
	<h2> Bienvenido al formulario de registro de clientes </h2>
	<p> Complete todos los campos obligatorios (marcados con *) y siga las instrucciones:<p>
	<ul>
		<li>La contraseña debe tener al menos 8 caracteres, entre ellos mayúsculas, minúsculas y números.</li>
		<li>La dirección de correo electrónico debe ser real y tener el formato example@copack.com</li>
		<li>Si es usted un particular, rellene el campo "Empresa" con la palabra "particular" y contacte con nosotros en el formulario <a link="sobre_nosotros.php">de la web</a></li>
	</ul>
</div>

	<?php 
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo "<p>".$error."</p>"; 
    		echo "</div>";
  		}
	?>
	
<div>
	<form id="altaUsuario" method="get" action="accion_alta_usuario.php">
			<input type="hidden" name="oidc" value="0">
		<label class="textoRegistro">Nombre:*<br>
			<input type="text" name="nombre" required><br><label>
		<label class="textoRegistro">Apellidos:*<br>
			<input type="text" name="apellidos" required><br><label>
		<label class="textoRegistro">password:*<br>
			<input type="password" name="password" required><br><label>
		<label class="textoRegistro">Confirmar password:*<br>
			<input type="password" name="passwordconf"><br><label>
		<label class="textoRegistro">Email:*<br>
			<input type="text" name="email" required><br><label>
		<label class="textoRegistro">Empresa:*<br>
			<input type="text" name="empresa" required><br><label>
		<div id="registrar">
			<input name="Registrar" type="submit" value = "registrar">
		</div>
	</form>
</div>

<?php
		include_once("pie.php");
?>
</body>
</html>
