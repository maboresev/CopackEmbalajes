<?php
session_start();
if(!isset($_SESSION['loginalm'])){
	Header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Almacén </title>
</head>

<body>
<main>
	<ul class="menu" id="menuPrincipal">
		<li id="elementoMenu"><a id="linkMenu" href="almacen.php">Gestión del stock en almacén</a></li>
		<li id="elementoMenu">	
			<form method="post" action="logout.php">
				<input type="submit" name="logout" value="Log out"></button>
			</form>
		</li>	
	</ul>

</main>
</body>
</html>