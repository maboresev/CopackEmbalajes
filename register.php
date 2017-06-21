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
  <script lang="javascript">
	function valida(){
		nombre=document.getElementById("nombre").value;
		apellidos=document.getElementById("apellidos").value;
		email=document.getElementById("email").value;
		empresa=document.getElementById("empresa").value;
		
		if((nombre == null) || (nombre.length == 0) || (/^\s+$/.test(nombre))){
			alert("Por favor, escriba un nombre válido");
			document.getElementById("nombre").style.borderColor="red";
			return false;
		}
		else if((apellidos == null) || (apellidos.length == 0) || (/^\s+$/.test(apellidos))){
			alert("Por favor, escriba al menos un apellido");
			document.getElementById("apellidos").style.borderColor="red";
			return false;
		}
		else if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {
			alert('Error: Formato de correo electrónico incorrecto.');
			document.getElementById("email").style.borderColor="red";
			return false;
		}
		else if((empresa == null) || (empresa.length == 0) || (/^\s+$/.test(empresa))){
			alert("Por favor, rellene correctamente el nombre de su empresa");
			document.getElementById("empresa").style.borderColor="red";
			return false;
		}
		else{
			return true;
		}
	}
  </script>
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
		<form id="altaUsuario" method="post" onsubmit="return valida()" action="accion_alta_usuario.php">
				<input type="hidden" name="oidc" value="0">
			<label class="textoRegistro" for="nombre">Nombre:*<br>
				<input type="text" name="nombre" id="nombre" required><br></label>
			<label class="textoRegistro" for="apellidos">Apellidos:*<br>
				<input type="text" name="apellidos" id="apellidos" required><br></label>
			<label class="textoRegistro" for="password">password:*<br>
				<input type="password" name="password" id="password" required><br></label>
			<label class="textoRegistro" for="passwordconf">Confirmar password:*<br>
				<input type="password" name="passwordconf" id="passwordconf"><br></label>
			<label class="textoRegistro" for="email">Email:*<br>
				<input type="text" name="email" id="email" required><br></label>
			<label class="textoRegistro" for="empresa">Empresa:*<br>
				<input type="text" name="empresa" id="empresa" required><br></label>
			<label class="textoRegistro">
				<input name="Registrar" type="submit" value = "registrar">
			</label>
		</form>
	</div>

		<p class="textoGen">¿Ya estás registrado? <a href="login.php" class="enlaceRedirige">Accede a tu usuario</a> 
							o vuelve a la <a href="index.php" class="enlaceRedirige">página de inicio</a>.</p>
	
	<br><br>

<?php
		include_once("pie.php");
?>
</body>
</html>
