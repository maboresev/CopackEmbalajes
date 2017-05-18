<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionProductos.php");
	require_once("gestion_datos_producto.php");
	require_once("consulta_paginada.php");
	
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
  <title> Adm. Productos </title>

</head>

<body>

<?php
	include_once("cabecera.php");
	include_once("menu_adm.php");
?>

<main>

		<div class="margenTop">
	<?php
		foreach($filas as $fila) {
	?>

	<article class="producto">
		<form method="get" action="controlador_productos.php">
			<div class="fila_producto">
				<div class="datos_producto">		
					<!-- Controles de los campos que quedan ocultos-->
					<input type="hidden" id="OID_P" name="OID_P" value="<?php echo $fila["OID_P"]; ?>"/>
				<?php
					if (isset($producto)&&($producto["OID_P"] == $fila["OID_P"])) { ?>
						<!-- Editando título -->
						<input type="text" id="NOMBRE" name="NOMBRE" value=<?php echo $fila["NOMBRE"]; ?>" />
						<?php	echo "Precio ".$fila["PRECIO"];	?>
						
						<?php }	else { 
						echo "<p>"."<strong>"."Producto: ".$fila["NOMBRE"]."</strong>".". ";
						echo "Material: ".$fila["MATERIAL"].". ";
						echo "Medidas: ".$fila["MEDIDAS"].". ";
						echo "Canal: ".$fila["CANAL"].". ";
						echo "Stock en almacén: ".$fila["STOCK"].". "; 
						echo "Precio(unidad): ".$fila["PRECIOUNITARIO"]."€.";
						?></div>
						<!-- mostrando título -->						
				<?php } ?>

				<div id="botones_fila">

					<button id="editar" name="editar" type="submit" class="editar_fila">

						<img src="images/edit.bmp" class="editar_fila" alt="Editar libro">

					</button>

					<button id="borrar" name="borrar" type="submit" class="editar_fila">

						<img src="images/delete.bmp" class="editar_fila" alt="Borrar producto">

					</button>
					
					<img class="info" id="<?php echo $fila["OID_P"]; ?>" src="images/info.png"/><div id="<?php echo "div_".$fila["OID_P"]; ?>"></div>
				</div>
				</p>
				
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
