<?php

	//VERIFICA SE USUARIO E SENHA ESTÃO CORRETOS
	if($_POST["usuario"] == "vitoriam.messias@gmail.com" && $_POST["senha"] == "1234"){
		//se o usuario e senha estiverem ok session sera definida como YES
		session_start();
		$_SESSION["Login"] =  "YES";
		$_SESSION["usuario"] =  "vitoria";
		header("Location: tabelaC.php");
	}
	else{
		//se o usuario e senha nao conferem session sera definida para NO
		session_start();
		$_SESSION["Login"] = "NO";
		header("Refresh: 0; url = erro.php");
	}
?>
