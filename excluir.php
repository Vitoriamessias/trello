<!DOCTYPE html>
<?php
	$id		 = $_GET["id"];
	$nome  	 = $_GET["nome"];
	if(ISSET($_POST['sim'])){
		$sql = "DELETE
				FROM contato_tb
				WHERE id = $id";
		include  "conexao.php";	
		$contato = $fusca -> prepare($sql);
		$contato -> execute();
		$fusca = NULL;	
		header ("Location: tabelaC.php");
	}
	
?>

<html>
	<head>
	<head>
	<script>
		function executar1(){
			document.getElementById("")
		}
	</script>
	<body>
		<h2>
			Excluir <?php echo $nome;?>?<br>
			
			<form action="#" method="POST">
				<input type="submit" value="Sim" id="sim" name='sim' onclick="executar1()">
				<input type="submit" value="Não" id="nao" onclick="executar2()">
			</form>
		</h2>
	</body>
</html>