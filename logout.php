<?php
session_start();

if (isset($_SESSION["logincliente"])){
	unset($_SESSION["logincliente"]);
	Header("Location: index.php");
} else if (isset($_SESSION["loginadm"])){
	unset($_SESSION["loginadm"]);
	Header("Location: index.php");
} else if (isset($_SESSION["loginmant"])){
	unset($_SESSION["loginmant"]);
	Header("Location: index.php");
} else if (isset($_SESSION["loginalm"])){
	unset($_SESSION["loginalm"]);
	Header("Location: index.php");
}

?>