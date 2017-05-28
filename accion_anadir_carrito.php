<?php	
	session_start();	

	if(isset($_POST["submit"])){
	if (isset($_SESSION["PEDIDO"])) {
		$pedido = $_SESSION["PEDIDO"];
		unset($_SESSION["pedido"]);
		$numpedido=$_POST["numpedido"];
		$cantidad=$_POST["cantidad"];
		require_once("gestionBD.php");
		require_once("gestionPedidos.php");
		
		$conexion = crearConexionBD();		
		$excepcion = añadir_carrito($conexion, $numpedido, $pedido["OID_P"], $cantidad);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$exception= "El error está en la funcion añadir";
			$_SESSION["exception"] = $exception;
			$_SESSION["destino"] = "carrito.php";
			Header("Location: exception.php");
		}
		else
			Header("Location: carrito.php");
		
	} 
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
</head>

<body>


<main>

	
	<!-- The HTML login form -->
	<form action="accion_anadir_carrito.php" method="post">
		<div>Número de pedido:<input type="text" name="numpedido" id="num" /></div>
		<div>Cantidad:<input type="number" name="cantidad" id="cantidad" /></div>
		<input type="submit" name="submit" value="submit" />
	</form>
</main>
</body>
</html>