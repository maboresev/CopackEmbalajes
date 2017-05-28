<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$formulario['nombre'] = "";
		$formulario['precio'] = "";
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
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Alta producto </title>
</head>

<body>

<?php
	include_once("cabecera_adm.php");
	include_once("menu_adm.php");

?>

<main>

	<div>
	<p Class="textoGen"> Añadir nuevo producto: </p>
	
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
			<form id="altaProducto" method="get" action="accion_alta_producto.php">
					<input type="hidden" name="oidp" value="0">
				<label class="textoRegistro">Nombre:*<br>
					<input type="text" name="nombre" required><br><label>
					<input type="hidden" name="stock" value="0"><br><label>
				<label class="textoRegistro">Precio:*<br>
					<input type="number" name="precio" required><br><label>
					<input type="hidden" name="oid_ual" value="<?php echo $_SESSION['OID_UAL'];?>"><br><label>
				<div id="registrar">
					<input name="altaProducto" type="submit" value = "altaProducto">
				</div>
			</form>
		</div>

	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
