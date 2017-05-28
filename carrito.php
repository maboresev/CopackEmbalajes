<?php 
session_start();

	require_once("gestionBD.php");
	
	if (isset($_SESSION["producto"])){
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
	}
	
	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	$email = $_SESSION["logincliente"];
	$conexion = crearConexionBD();

		// La consulta que ha de paginarse
	$pquery = "select PEDIDO.NUM_PEDIDO, CLIENTE.CORREOELECTRONICO
				from PEDIDO, CLIENTE
				where PEDIDO.OID_C = CLIENTE.OID_C
				ORDER BY NUM_PEDIDO";
	$lpquery = "select PEDIDO.NUM_PEDIDO, PEDIDO.FECHA_PEDIDO,
PRODUCTO.OID_P, PEDIDO.OID_C, PRODUCTO.NOMBRE,
PRODUCTO.PRECIOUNITARIO, LINEA_DE_PEDIDO.CANTIDADPEDIDA,
CLIENTE.CORREOELECTRONICO

from LINEA_DE_PEDIDO, PEDIDO, PRODUCTO, CLIENTE

where LINEA_DE_PEDIDO.NUM_PEDIDO = PEDIDO.NUM_PEDIDO and
LINEA_DE_PEDIDO.OID_P = PRODUCTO.OID_P and CLIENTE.OID_C = PEDIDO.OID_C
and PEDIDO.CARRITO = 'SI'


ORDER BY PEDIDO.NUM_PEDIDO";

	$lineas= $conexion->query($lpquery);
	$pedidos= $conexion->query($pquery);
	cerrarConexionBD($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Cliente </title>
</head>

<body>

<?php
	include_once("cabecera_cliente.php");
	include_once("menu_cliente.php");
?>

<main>
<div class="margenTop"></div>
	<article class="pedido">
<form method="post" action="controlador_pedidos.php">
<div class="datos_pedido">

	<?php
						echo "Tus pedidos en carrito: ";
						echo "<ul>";
						foreach($pedidos as $pedido){
							
							if($email == $pedido["CORREOELECTRONICO"]){
								?>
								<li>
								
								<?php
								echo $pedido['NUM_PEDIDO'];

								?>
								
								</li>
								
								
								<?php

							}
						}
						echo "</ul>";
						$pedidos= array();
						foreach($lineas as $linea){
								
								if($linea["CORREOELECTRONICO"] == $email){
									if(!in_array($linea["NUM_PEDIDO"],$pedidos)){?>
									<input type="hidden" id="NUM_PEDIDO" name="NUM_PEDIDO" value="<?php echo $linea["NUM_PEDIDO"]; ?>"/>


<?php
									echo "<p>"."<strong>"."Pedido: ".$linea["NUM_PEDIDO"]."</strong>".". ".
									'<input id="confirmar" name="confirmar_pedido" type="submit" class="confirmar_pedido" value="Confirmar pedido"></input>'.
									'<input id="borrar" name="borrar" type="submit" class="borrar" value="Borrar"></input>'; 
									

									array_push($pedidos, $linea["NUM_PEDIDO"]);	
									}
									
									echo "<p>"."<strong>".$linea["NOMBRE"].": ".$linea["CANTIDADPEDIDA"]." unidades"."</strong>".". "."</p>"; 
								}
						}
?>
</div>
</form>
</article>


<?php
	include_once("pie.php");
?>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
