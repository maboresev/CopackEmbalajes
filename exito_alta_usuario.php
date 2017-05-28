<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: register.php");	

	$conexion = crearConexionBD(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión de Usuarios: Alta de Usuario realizada con éxito</title>  
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<?php
		include_once("cabecera.php");
	?>

		<main>
		<?php if (insertaCliente($conexion, $nuevoUsuario)) { 
				$_SESSION['login'] = $nuevoUsuario['email'];
		?>
				<p class="textoGen">Hola <strong><?php echo $nuevoUsuario["nombre"]; ?></strong>, gracias por registrarte<br><br>
			   		Pulsa <a href="index_cliente.php" class="enlaceRedirige">aquí</a> para acceder a la gestión de sus pedidos.</p>
		<?php } else { ?>
				<div >
				<p class="textoGen">El usuario ya existe en la base de datos.
					<br><br>
					Pulsa <a href="register.php">aquí</a> para volver al formulario.</p>
				</div>
		<?php } ?>

	</main>

	<?php
		include_once("pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>
