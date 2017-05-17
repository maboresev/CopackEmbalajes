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
/*
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
*/
	$conexion = crearConexionBD();
/*	
		// La consulta que ha de paginarse
	$query = 'SELECT PRODUCTO.OID_P, MASTERMAT.OID_P, PRODUCTO.NOMBRE, PRODUCTO.PRECIOUNITARIO'
		.'FROM PRODUCTO, MASTERMAT '
		.'WHERE '
			.'PODUCTO.OID_P = MASTERMAT.OID_P '
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
*/
	$filas = consultarTodosProductos($conexion);
	cerrarConexionBD($conexion);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" type="text/css" href="./js/jquery-ui.css"/>
  <script src="./js/jquery.js"></script>
  <script src="./js/jquery-ui.min.js"></script>
  <title> Nuestros productos </title>
  <script>
  $(document).ready(function(){
	  $(".info").on("click", function(){
		  var img=(this);
		  $.get("gestion_datos_producto.php",{ producto:1010}, function(data){
			  
			  
			 // añadir dentro del div la info data
			  $("#div_"+img.id).dialog();
		  
		  });
	  });
  });
 </script>
  
</head>

<body>

<?php
	include_once("cabecera.php");
	include_once("menu.php");
?>

<main>
	 <nav>
		<div id="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>
						<a href="muestra_productos.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>
		</div>

		<form method="get" action="muestra_productos.php">
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
						echo "<p>"."<strong>"."Producto: ".$fila["NOMBRE"]."</strong>".". ";
						/* echo "Material: ".$fila["MATERIAL"].". ";
						echo "Medidas: ".$fila["MEDIDAS"].". ";
						echo "Canal: ".$fila["CANAL"].". ";
						echo "Stock en almacén: ".$fila["STOCK"].". "; */
						echo "Precio(unidad): ".$fila["PRECIOUNITARIO"]."€.";
						?><img class="info" id="<?php echo $fila["OID_P"]; ?>" src="images/info.png"/><div id="<?php echo "div_".$fila["OID_P"]; ?>"></div></p>
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
