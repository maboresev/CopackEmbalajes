<?php
	session_start();
	include_once("gestionBD.php");
	include_once("gestionarUsuarios.php");
	
	if (isset ($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$tipousuario = $_POST['tipousuario'];
		
		switch($tipousuario){
		
		case 'cliente':
			$conexion = crearConexionBD();
			$numero_usuarios = consultarClientes($conexion, $email, $password);
			cerrarConexionBD($conexion);
	
			if($numero_usuarios == 0)
				$login = "error";
			else {
				$_SESSION['logincliente'] = $email;
				Header("Location: index_cliente.php");
			}
		
		case 'adm':
			$conexion = crearConexionBD();
			$numero_usuarios = consultarAdministracion($conexion, $email, $password);
			cerrarConexionBD($conexion);
	
			if($numero_usuarios == 0)
				$login = "error";
			else {
				$_SESSION['loginadm'] = $email;
				Header("Location: index_adm.php");
			}
			
		case 'alm':
			$conexion = crearConexionBD();
			$numero_usuarios = consultarAlmacen($conexion, $email, $password);
			cerrarConexionBD($conexion);
	
			if($numero_usuarios == 0)
				$login = "error";
			else {
				$_SESSION['loginalm'] = $email;
				Header("Location: index_almacen.php");
			}
		
/*		case 'mant':
			$conexion = crearConexionBD();
			$numero_usuarios = consultarMantenimiento($conexion, $email, $password);
			cerrarConexionBD($conexion);
	
			if($numero_usuarios == 0)
				$login = "error";
			else {
				$_SESSION['loginmant'] = $email;
				Header("Location: index_mantenimiento.php");
			}*/
		
		
		
		}
		
		
	}
	
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Gestión de Usuarios: Formulario de acceso</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

	<div class="topLogin">
		<h2> Bienvenido al formulario de acceso a usuarios registrados </h2>
		<p> Por favor, rellene sus datos. Si tiene algún problema, contacte con el administrador del sistema mediante el <a href="contacta.php" class="enlaceRedirige">formulario de contacto</a>.<p>
	</div>
	
	<?php if (isset($login)) {
		echo "<div id=\"div_errores\" class=\"error\">";
		echo "<h4>Error en la contraseña o no existe el usuario.</h4>";
		echo "</div>";
		}	
	?>
	
	<div class="formulario">
		<form action="login.php" method="post">
			<label class="textoRegistro" for="email">Email:*<br><br>
				<input type="text" name="email" id="email" required /></label><br>
			<label class="textoRegistro" for="password">Contraseña:*<br>
				<input type="password" name="password" id="password" required /></label><br><br>
			<label class="textoRegistro">	
				<input type="radio" name="tipousuario" value="cliente" checked> Cliente
				<input type="radio" name="tipousuario" value="adm"> Administración
				<input type="radio" name="tipousuario" value="alm"> Almacén
			</label>
			<br><br>
			<label class="textoRegistro">	
				<button type="submit" name="submit" value="submit">Log in</button>
			</label>
			<br>
			
			</form>
	</div>
		
		<p class="textoGen">¿Aún no estás registrado? <a href="register.php" class="enlaceRedirige">Regístrate</a> 
							o vuelve a la <a href="index.php" class="enlaceRedirige">página de inicio</a>.</p>
	
	<br><br>
	
	<?php
		include_once("pie.php");
	?>

</body>
</html>