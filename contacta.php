
<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="style.css" />

  <title> Contacta con nosotros </title>
  
  <script lang="javascript">
  
	function validacion() {
		var nombre = document.getElementById("nombre").value;
		var mail = document.getElementById("mail").value;
		var area = document.getElementById("areaEscribe").value;
		
		if ((nombre == null) || (nombre.length == 0) || (/^\s+$/.test(nombre))) {
			window.alert('Error: Formato del nombre incorrecto.');
			return false;
		}
		else if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(mail)) {
			window.alert('Error: Formato de correo electrónico incorrecto.');
			return false;
		}
		else if (area.length <= 20) {
			alert('Error: El mensaje es demasiado corto.');
			return false;
		}
		else{
			window.alert('Mensaje enviado correctamente.');
			return true;
		}
	}
  </script>

</head>



<body>



<?php

	include_once("cabecera.php");

	include_once("menu.php");
?>



<main>


	<form id="formularioContacto" method="post" onsubmit="return validacion()">

		<legend id="leyendaContacto">Formulario de contacto:</legend><br>

		<label id="formContacto">Nombre:       

			<input type="text" placeholder="Tu nombre..." name="nombre" id="nombre" required></input></label> 

		<br>

		<label id="formContacto">Correo electronico:

			<input type="e-mail" placeholder="example@copack.es"  name="email" id="mail" required></input></label>

		<br>
		
		<label id="formContacto" >¿Eres un particular?

			<input name="particular" type="radio" name="particular" value="1" checked></input>Sí

			<input name="particular" type="radio" name="particular" value="2"></input>No

		</label> 

		<br><br>

		<label id="formContacto">Escribenos tus dudas:<br>

			<textarea rows="10" id="areaEscribe" name="mensaje" placeholder="Escribe aqui" required></textarea></label>
	
		<br>

		<input type="submit" value="enviar"></input>
	</form>
</main>


<?php

	include_once("pie.php");

?>

  
</body>
</html>