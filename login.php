<?php
	session_start();
	require_once("gestionBD.php");
	
	$conexion = crearConexionBD();
	
	cerrarConexionBD($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
</head>

<div class="formulario">
	<form action="loginconnectivity.php" method="post">
		Email:<br>
		<input type="text" name="email" required><br>
		Contraseña:<br>
		<input type="password" name="password" required><br><br>
		button type="submit" name="login">Log in</button>
		<a href="register.php">Regístrate</a>
	</form>
</div>