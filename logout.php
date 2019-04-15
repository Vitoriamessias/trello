<?php
	session_start();
	session_destroy();
	//echo "secao encerrada";
	header("Location:login.php");
?>

