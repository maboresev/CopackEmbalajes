<?php
session_start();
if(!isset($_SESSION['loginadm'])){
	Header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Menu Administracion </title>
</head>

<body>
<main>
	<ul class="menu" id="menuPrincipal">
		<li id="elementoMenu"><a id="linkMenu" href="admin_productos.php" target>Administrar productos</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="gestion_pedidos.php">Gestión de pedidos</a></li>
		<li id="elementoMenu"><a id="linkMenu" href="alta_producto.php">Alta productos</a></li>
		<li id="elementoMenu">	
			<form method="post" action="logout.php">
				<input type="submit" name="logout" value="Log out"></button>
			</form>
		</li>	
	</ul>
	
</main>
</body>
</html>