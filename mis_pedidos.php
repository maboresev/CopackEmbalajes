<?php
	session_start();

	require_once("gestionBD.php");
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
										(isset($paginacion)? (int)$paginacion["PAG_TAM"]: 1);
	if ($pagina_seleccionada < 1) $pagina_seleccionada = 1;
	if ($pag_tam < 1) $pag_tam = 1;
	
	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

		// La consulta que ha de paginarse
	$query = 'select PEDIDO.NUM_PEDIDO, PEDIDO.FECHA_PEDIDO,
PRODUCTO.OID_P, PEDIDO.OID_C, PRODUCTO.NOMBRE,
PRODUCTO.PRECIOUNITARIO, LINEA_DE_PEDIDO.CANTIDADPEDIDA


from LINEA_DE_PEDIDO, PEDIDO, PRODUCTO

where LINEA_DE_PEDIDO.NUM_PEDIDO = PEDIDO.NUM_PEDIDO and
LINEA_DE_PEDIDO.OID_P = PRODUCTO.OID_P

ORDER BY PEDIDO.NUM_PEDIDO';
	
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
  <title> Mis pedidos </title>
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
	
	<div class="margenTop"></div>
	<?php
		foreach($filas as $fila) {
	?>


	<article class="pedido">
		<form method="get" action="controlador_pedidos.php">
			<div class="fila_pedido">
				<div class="datos_pedido">		
					<!-- Controles de los campos que quedan ocultos -->
					<input type="hidden" id="OID_C" name="OID_C" value="<?php echo $fila["OID_C"]; ?>"/>
						
						<?php  
						echo "<p>"."<strong>"."Pedido: ".$fila["NUM_PEDIDO"]."</strong>".". ";
						echo "Fecha: ".$fila["FECHA_PEDIDO"];
						?>
						</p>
						<!-- mostrando título -->	

				</div>
				
			</div>
		</form>
		
	</article>
		<?php } ?>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
