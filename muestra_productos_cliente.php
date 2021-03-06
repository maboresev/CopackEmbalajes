<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionProductos.php");
	require_once("consulta_paginada.php");
	
	if (isset($_SESSION["producto"])){
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
	}

	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"])) $paginacion = $_SESSION["paginacion"];
	$pagina_seleccionada = isset($_GET["PAG_NUM"])? (int)$_GET["PAG_NUM"]:
												(isset($paginacion)? (int)$paginacion["PAG_NUM"]: 1);
	$pag_tam = isset($_GET["PAG_TAM"])? (int)$_GET["PAG_TAM"]:
										(isset($paginacion)? (int)$paginacion["PAG_TAM"]: 5);
	if ($pagina_seleccionada < 1) $pagina_seleccionada = 1;
	if ($pag_tam < 1) $pag_tam = 5;
	
	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

		// La consulta que ha de paginarse
	$query = 'SELECT PRODUCTO.OID_P, PRODUCTO.NOMBRE, PRODUCTO.PRECIOUNITARIO,'
		.'PRODUCTO.STOCK, PRODUCTO.OID_UAL, MASTERMAT.CANAL, MASTERMAT.MEDIDAS, MASTERMAT.MATERIAL '
		.'FROM PRODUCTO, MASTERMAT '
		.'WHERE '
			.'PRODUCTO.OID_P = MASTERMAT.OID_P '
		.'ORDER BY OID_P';
	
		// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion,$query);
	$total_paginas = (int) ($total_registros / $pag_tam);
	if ($total_registros % $pag_tam > 0) $total_paginas++;
	if ($pagina_seleccionada > $total_paginas) $pagina_seleccionada = $total_paginas;
	
	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion,$query,$pagina_seleccionada,$pag_tam);
	cerrarConexionBD($conexion);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Nuestros productos </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
	$(document).ready(function(){
		$("h4").hide();
		$("button").click(function(){
			$("h4").toggle();
		});
	});
 </script>
  
</head>

<body>

<?php
	include_once("cabecera_cliente.php");
	include_once("menu_cliente.php");
?>

<main>
	 <nav>
		<div class="enlaces">
		<p class="textoGen">Páginas:</p>
			<?php 
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>
						<a class="nocurrent" href="muestra_productos_cliente.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>
		</div>

		<form method="get" action="muestra_productos_cliente.php" class="consultaPaginada">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando
			<input id="PAG_TAM" name="PAG_TAM" type="number"
				min="1" max="<?php echo $total_registros;?>"
				value="<?php echo $pag_tam?>" autofocus="autofocus" />
			entradas de <?php echo $total_registros?>
			<input type="submit" value="Cambiar">
		</form>  
	</nav> 
		
	<div class="margenTop">
	<?php
		foreach($filas as $fila) {
	?>


	<article class="producto">
		<form method="post" action="controlador_pedidos.php">
			<div class="fila_producto">
				<div class="datos_producto">		
					<!-- Controles de los campos que quedan ocultos -->
					<input type="hidden" id="OID_P" name="OID_P" value="<?php echo $fila["OID_P"]; ?>"/>
						
						<?php  
						echo "<p>"."<strong>"."Producto: ".$fila["NOMBRE"]."</strong>".". ";
						echo "Precio(unidad): ".$fila["PRECIOUNITARIO"]."€.";
						echo '<label class="editar_fila"><input id="añadir_carrito" name="añadir_carrito" type="submit" class="añadir_carrito" value="Añadir al carrito"></input></label>';
						?>
						</p>
						<h4><?php echo "Material: ".$fila["MATERIAL"].". ";
						echo "Medidas: ".$fila["MEDIDAS"].". ";
						echo "Canal: ".$fila["CANAL"].". ";
						echo "Stock en almacén: ".$fila["STOCK"].". "; ?>
						</h4>
						<!-- mostrando título -->	

				</div>
				
			</div>
		</form>
		
	</article>

	<?php } ?>
	
	</div>
	<div class="margenInfo">
		<button class="botonInfo" title="Clicka para más información"><img class="info" src="images/info.png"/></button>
	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
