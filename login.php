<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionarUsuarios.php");
	
	if (isset ($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$conexion = crearConexionBD();
		$numero_usuarios = consultarClientes($conexion, $email, $password);
		cerrarConexionBD($conexion);
	
		if($numero_usuarios == 0)
		$login = "error";
		else {
		$_SESSION['login'] = $email;
		Header("Location: index_cliente.php");
		}
		
	}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
</head>
<main>
<?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}	
	?>

<div class="formulario">
	<form action="login.php" method="post">
		Email:<br>
		<input type="text" name="email" required/><br>
		Contraseña:<br>
		<input type="password" name="password" required/><br><br>
		<button type="submit" name="submit" value="submit">Log in</button>
		<a href="register.php">Regístrate</a>
	</form>
</div>
</main>
</html>