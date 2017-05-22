<?php
require_once("gestionBD.php");

if (isset($_SESSION["login"])){
		$login = $_SESSION["login"];
		unset($_SESSION["login"]);
	}

$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<style>
button {
	margin-right: 10px;
}
</style>
<meta charset="utf-8">
<form action="loginconnectivity.php" method="post">
Email:<br>
<input type="text" name="email" required><br>
Contraseña:<br>
<input type="password" name="password" required><br><br>
<button type="submit" name="login">Log in</button>
<a href="register.php">Regístrate</a>
</form>