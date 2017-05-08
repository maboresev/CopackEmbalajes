<?php
  //Guarda los valores del formulario.
  $nombre = $_POST["nombre"];
  $correo = $_POST["email"];
  $particular = $_POST["particular"];
  $mensaje = $_POST["mensaje"];
?>
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

	<form id="formularioContacto" method="post">
	<legend id="leyendaContacto">Formulario de contacto:</legend><br>
	<label id="formContacto">Nombre:       
		<input type="text" placeholder="Tu nombre..." name="nombre" required></input></label> 
	<br>
	<label id="formContacto">Correo electronico:
		<input type="e-mail" placeholder="example@copack.es"  name="email" required></input></label>
	<br>
	<label id="formContacto" >¿Eres un particular?
		<input name="particular" type="radio" name="particular" value="1" checked></input>Sí
		<input name="particular" type="radio" name="particular" value="2"></input>No
	</label> 
	<br><br>
	<label id="formContacto">Escribenos tus dudas:<br>
		<textarea rows="10" id="areaEscribe" name="mensaje" placeholder="Escribe aqui" required></textarea></label>
	<br>
		<input type="submit" value="enviar" reset></input>
	</form>
</main>
<?php
	include_once("pie.php");
?>
  <?php
    // Si hay valores en blanco no hacer nada y borrar lo que hay en #contenido.
    if ($nombre == "" || $correo == "" || $particular == "" || $mensaje == "") {
      echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "";</script>';
    } else {
      $para = "localhost";
      $msjCorreo = "Nombre: $nombre\n E-Mail: $correo\n Particular: $particular\n Mensaje:\n $mensaje";
	  $headers = "From: localhost";
      $envio = mail($para, $correo, $msjCorreo, $headers);
      // Revisar el envío y según lo que pase mostrar mensaje.
      if($envio){
        echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "El formulario se envío con éxito";</script>';
      } else {
        echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "Fallo el envío del formulario.";</script>';
      }
    }
  ?>

</body>

</html>