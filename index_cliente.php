<?php 
session_start();
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

	<div>
		<p class="textoGen"> Bienvenido a la web. Acceso a la gestión de pedidos y productos como cliente. </p>
	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
