<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> �ndice principal </title>
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

<<<<<<< Updated upstream
	<p id="textoGen"> Página en construcción </p>
=======
	<p id="textoGen"> P�gina en construcci�n </p>
	
	<form id="formularioContacto">
	Nombre:
		<input type="text"></input>
	<br>
	Correo electr�nico:
		<input type="e-mail" value="example@copack.es"></input>
	<br>
	Escr�benos tus dudas:
		<input type="text" name="Escr�benos tus dudas" value="Escribe aqu�"></input>
	</form>
>>>>>>> Stashed changes
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
