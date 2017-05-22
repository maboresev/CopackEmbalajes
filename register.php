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
<meta charset="utf-8">

	<?php 
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error; 
    		echo "</div>";
  		}
	?>
	

<form id="altaUsuario" method="get" action="accion_alta_usuario.php">
<input type="hidden" name="oidc" value="0">
Nombre:*<br>
<input type="text" name="nombre" required><br>
Apellidos:*<br>
<input type="text" name="apellidos" required><br>
password:*<br>
<input type="password" name="password" required><br>
Confirmar password:*<br>
<input type="password" name="passwordconf"><br>
Email:*<br>
<input type="text" name="email" required><br>
Empresa:*<br>
<input type="text" name="empresa" required><br>

<input name="Registrar" type="submit" value = "registrar">
</form>
</html>
