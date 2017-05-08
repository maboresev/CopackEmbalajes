<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionProductos.php");
	
	if (isset($_SESSION["producto"])){
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
	}

	$conexion = crearConexionBD();
	$filas = consultarTodosProductos($conexion);
	cerrarConexionBD($conexion);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Nuestros productos </title>
</head>

<body>

<?php
	include_once("cabecera.php");
	include_once("menu.php");
?>

<main>

	<div class="margenTop">
	<?php
		foreach($filas as $fila) {
	?>

	<article class="producto">
		<form method="get" action="controlador_libros.php">
			<div class="fila_producto">
				<div class="datos_producto">		
					<!-- Controles de los campos que quedan ocultos:
						OID_LIBRO, OID_AUTOR, OID_AUTORIA, NOMBRE, APELLIDOS -->
					<input type="hidden" id="OID_P" name="OID_P" value="<?php echo $fila["OID_P"]; ?>"/>
				<?php
					if (isset($producto)&&($producto["OID_P"] == $fila["OID_P"])) { ?>
						<!-- Editando título -->
						<input type="text" id="NOMBRE" name="NOMBRE" value=<?php echo $fila["NOMBRE"]; ?>" />
						<?php	echo "Precio ".$fila["PRECIO"];	?>
						
						<?php }	else { 
						echo "<p>"."Producto: ".$fila["NOMBRE"].". ";
						echo "Material: ".$fila["MATERIAL"].". ";
						echo "Medidas: ".$fila["MEDIDAS"].". ";
						echo "Canal: ".$fila["CANAL"].". ";
						echo "Stock en almacén: ".$fila["STOCK"].". ";
						echo "Precio(unidad): ".$fila["PRECIOUNITARIO"].".";
						?><img id="imagenInfo" src="images/info.png"/></p>
						<!-- mostrando título -->						
				<?php } ?>

				</div>
				
			</div>
		</form>
	</article>

	<?php } ?>
	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
