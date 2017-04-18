<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Índice principal </title>
</head>

<body>

<?php
	include_once("cabecera.php");
?>

<main>
	<ul id="menu">
		<li id="elementoMenu"><a id="linkMenu" href="login.php">login</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="muestra_productos.php">Nuestros productos</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="sobre_nosotros.php">Sobre nosotros</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="contacta.php">Contacta con nosotros</a></li>
	</ul>

	<p id="textoGen"> Bienvenido a la web (Formatos provisionales para accesos a pruebas) </p>
	<p id="textoGen"> Acceso al formulario de <a href="register.php">registro</a> </p>
	<p id="textoGen"> Acceso al <a href="login.php">login</a> </p>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
