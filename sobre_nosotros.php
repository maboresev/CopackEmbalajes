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

	<p id="textoGen"> Página prevista de revisión <p>
	<p id="textoNosotros">COPACK 2005 S.L. es una empresa dedicada a la fabricación de embalajes de papel, cartón y plástico. 
	Estamos en la Calle Junco 0, Valencina de la Concepción (Sevilla), y llevamos en funcionamiento desde 2005. (<a href="http://copack-2005.pymes.com/">Fuente</a> )<br><br>
	La empresa hace uso de distinta maquinaria y empleados para satisfacer la demanda de sus clientes en lo referente a embalajes.
	Trabajamos casi exclusivamente bajo encargo, ya que necesitamos cierto tiempo para la creación de los embalajes. 
	Esta empresa se encarga exclusivamente de la fabricación de los embalajesj el transporte tanto de las materias primas que reciben y el envío
	de embalajes a las diferentes entidades que los solicitan son encargadas a otras empresas de transporte.<br><br>
	Para solicitar alguna demanda de embalajes a COPACK es necesario contactar con la empresa mediante nuestro formulario de consulta.</p>
	
	<h5><img id="imagenNosotros" src="images/mapa.png" /><br>
	Aquí estamos </h5>
	<br><br>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
