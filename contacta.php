<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Contacta con nosotros </title>
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

	<p id="textoGen"> Página en construcción </p>
	
	<form id="formularioContacto">
	<legend id="leyendaContacto">Formulario de contacto:</legend><br>
	<label>Nombre:       
		<input type="text" placeholder="Tu nombre..." required></input></label> 
	<br>
	<label>Correo electronico:
		<input type="e-mail" placeholder="example@copack.es" required></input></label>
	<br>
	Escribenos tus dudas:<br>
		<textarea rows="10" name="Escribenos tus dudas" placeholder="Escribe aqui" required></textarea>
	<br>
		<input type="submit" value="enviar" reset></input>
	</form>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
