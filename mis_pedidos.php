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
	$lpquery = "select PEDIDO.NUM_PEDIDO, PEDIDO.FECHA_PEDIDO,
PRODUCTO.OID_P, PEDIDO.OID_C, PRODUCTO.NOMBRE,
PRODUCTO.PRECIOUNITARIO, LINEA_DE_PEDIDO.CANTIDADPEDIDA,
CLIENTE.CORREOELECTRONICO

from LINEA_DE_PEDIDO, PEDIDO, PRODUCTO, CLIENTE

where LINEA_DE_PEDIDO.NUM_PEDIDO = PEDIDO.NUM_PEDIDO and
LINEA_DE_PEDIDO.OID_P = PRODUCTO.OID_P and CLIENTE.OID_C = PEDIDO.OID_C
and PEDIDO.CARRITO = 'NO'


ORDER BY PEDIDO.NUM_PEDIDO";

	$lineas= $conexion->query($lpquery);

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
	
	<div class="margenTop"></div>
	<article class="pedido">
<form method="get" action="controlador_pedidos.php">
<div class="datos_pedido">

	<?php
						$pedidos= array();
						foreach($lineas as $linea){
								if($linea["CORREOELECTRONICO"] == $email){
									if(!in_array($linea["NUM_PEDIDO"],$pedidos)){
									echo "<br><p class='textoCliPrinc'>"."<strong>"."Pedido: ".$linea["NUM_PEDIDO"]."</strong>".". "."</p>"; 
									array_push($pedidos, $linea["NUM_PEDIDO"]);	
									}
									
									echo "<p class='textoCli'>".$linea["NOMBRE"].": ".$linea["CANTIDADPEDIDA"]." unidades".". "."</p>"; 
								}
						}
?>
</div>
<br>
</form>
</article>


<?php
	include_once("pie.php");
?>
</main>

</body>
</html>
