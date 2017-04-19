<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> ï¿½ndice principal </title>
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
	<p id="textoGen"> PÃ¡gina en construcciÃ³n </p>
=======
	<p id="textoGen"> Página en construcción </p>
	
	<form id="formularioContacto">
	Nombre:
		<input type="text"></input>
	<br>
	Correo electrónico:
		<input type="e-mail" value="example@copack.es"></input>
	<br>
	Escríbenos tus dudas:
		<input type="text" name="Escríbenos tus dudas" value="Escribe aquí"></input>
	</form>
>>>>>>> Stashed changes
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
