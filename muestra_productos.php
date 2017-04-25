<?php
	session_start();

	include_once("gestionBD.php");
	include_once("gestionProductos.php");

	if(isset($_SESSION["producto"])){
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
	}
	else{
		$conexion=crearConexionBD();
		$producto=$_SESSION["producto"];
		
		$query= "SELECT * FROM PRODUCTO, MASTERMAT"
		. " WHERE (PRODUCTO.OID_P = PRODUCTO.OID_P"
		. " ORDER BY NOMBRE";
		
		$filas = consultarTodosProductos($conexion, $query);
	}
	
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
	<p class="textoGen"> Página en construcción </p>
	
	
	<div>
	<?php
		foreach ($filas as $fila){
	?>
	<?php if((isset ($producto))and ($producto["oid_p"] == $fila["oid_p"])){ ?>
		<p class="textoGen"> Producto: <?php $producto["nombre"] ?>. Precio: <?php $producto["precio"] ?>. </p> <?php }} ?>
	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
