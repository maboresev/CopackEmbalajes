<?php

if(!isset($_SESSION['logincliente'])){
	Header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Cliente </title>
</head>

<body>
<main>

	<ul class="menu" id="menuPrincipal">
		<li id="elementoMenu"><a id="linkMenu" href="mis_pedidos.php">Mis pedidos</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="muestra_productos_cliente.php">Productos</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="carrito.php">Carrito</a></li>
		<li id="elementoMenu">	
			<form method="post" action="logout.php">
				<input type="submit" name="logout" value="Log out"></button>
			</form>
		</li>	
	</ul>

</main>
</body>
</html>