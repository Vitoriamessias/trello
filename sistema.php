<?php
	session_start();
	if($_SESSION["Login"] != "YES"){
		header("Location: login.php");
	}
?>
<html>
	<body>
		<form method="POST" action="logout.php">
			Deu tudo certo
			<button>Sair</button>
		</form>			
	</body>
</html>