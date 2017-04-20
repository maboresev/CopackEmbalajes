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
	include_once("menu.php");
?>

<main>
	
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
