<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionProductos.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		$nuevoProducto = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: alta_usuario.php");	

	$conexion = crearConexionBD(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión de Producto: Alta de producto realizada con éxito</title>  
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<?php
		include_once("cabecera.php");
	?>

		<main>
		<?php if (alta_producto($conexion, $nuevoProducto)) { 
				$_SESSION['producto'] = $nuevoProducto['oidp'];
		?>
				<p class="textoGen">El producto <strong><?php echo $nuevoProducto["nombre"]; ?></strong>, ha sido registrado correctamente<br><br>
			   		Pulsa <a href="muestra_productos_admin.php" class="enlaceRedirige">aquí</a> para acceder a la gestión de los productos.</p>
		<?php } else { ?>
				<h1>El producto ya existe en la Base de Datos.</h1>
				<div >	
					Pulsa <a href="alta_producto.php">aquí</a> para volver al formulario.
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
