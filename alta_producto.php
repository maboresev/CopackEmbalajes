<?php
	

if(isset($_POST["submit"])){
	require_once("gestionBD.php");
	require_once("gestionProductos.php");
	
	$nombre = $_POST["nombre"];
	$preciounitario = $_POST["preciounitario"];

	$preciounitario = str_replace(".",",",$preciounitario);

		$conexion = crearConexionBD();
		$excepcion = alta_producto($conexion, 0, $nombre,0,$preciounitario,1);
			$query = "SELECT PRODUCTO.OID_P
				FROM PRODUCTO
				WHERE PRODUCTO.NOMBRE = '${nombre}'";
	$productos = $conexion ->query($query);
	$oidp = "";
	foreach($productos as $producto){
	$oidp = $producto["OID_P"];
	

		
	 
}
	$material= $_POST["material"];
	$medidas= $_POST["medidas"];
	$canal= $_POST["canal"];
		$excepcion = alta_mastermat($conexion,$oidp, $material, $medidas, $canal);
		cerrarConexionBD($conexion);
			
	if ($excepcion<>"") {
			$exception= "Error al crear el master";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "admin_productos.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: admin_productos.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Alta producto </title>
</head>

<body>

<?php
	include_once("cabecera_adm.php");
	include_once("menu_adm.php");

?>

<main>

	<div>
	<p Class="textoGen"> Añadir nuevo producto: </p>
	
		<?php 
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo "<p>".$error."</p>"; 
    		echo "</div>";
  		}
	?>
	
		<div>
			<form method="post" action="alta_producto.php">
				<label class="textoRegistro">Nombre:*<br>
					<input type="text" name="nombre" required><br></label>
				<label class="textoRegistro">Precio:*
					<input type="number" name="preciounitario" step="0.01" required><br></label>
				<label class="textoRegistro">Material:*<br>
					<input type="text" name="material"  required><br></label>
				<label class="textoRegistro">Medidas:*<br>
					<input type="text" name="medidas"  required><br></label>
				<label class="textoRegistro">Canal:*<br>
					<input type="text" name="canal" required><br></label>
				<label class="textoRegistro">
					<input name="submit" type="submit" value = "submit"></label>
			</form>
		</div> <br>
			
	</div>
</main>

<?php
	include_once("pie.php");
?>

</body>
</html>
