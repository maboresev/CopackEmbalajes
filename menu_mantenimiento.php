<?php
session_start();
if(!isset($_SESSION['loginmant'])){
	Header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title> Sobre nosotros </title>
</head>

<body>
<main>
	<form method="post" action="logout.php">
	<input type="submit" name="logout" value="Log out"></button>
	</form>
	<ul class="menu" id="menuPrincipal">
		<li id="elementoMenu"><a id="linkMenu" href="maquinaria.php"> Maquinaria</a></li>

	</ul>

</main>
</body>
</html>