﻿<?php 
	session_start();
	
	$excepcion = $_SESSION["exception"];
	unset($_SESSION["exception"]);
	
	if (isset ($_SESSION["destino"])) {
		$destino = $_SESSION["destino"];
		unset($_SESSION["destino"]);	
	} else 
		$destino = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/biblio.css" />
  <title>Página de error</title>
</head>
<body>	
	
<?php	
	include_once("cabecera.php"); 
?>	

	<div class="exception">
		<h2>Ups!</h2>
		<?php if ($destino<>"") { ?>
		<p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="<?php echo $destino ?>">aquí</a> para volver a la página.</p>
		<?php } else { ?>
		<p>Ocurrió un problema para acceder a la base de datos. </p>
		<p>Pulse <a class="enlaces" href="<?php echo $destino ?>">aquí</a> para volver a la página.</p>
		<?php } ?>
	</div>
		
	<div class='exception' id="infoExcepcion">	
		<?php echo "Información relativa al problema: $excepcion;" ?>
		
		
	</div>

<?php	
	include_once("pie.php");
?>	

</body>
</html>