<!DOCTYPE html>
<?php
	$id = $_GET['id'];										
	$sql = "SELECT * FROM contato_tb WHERE id = $id";
	include "conexao.php";									// variavel que recebe a string
	$contato = $fusca -> prepare($sql);					//faz conexao e prepara 
	$contato -> execute();						    	    //executa o comando

	foreach($contato as $bolacha){}
	if(ISSET($_POST['salvar'])){
		$nome		 = $_POST['nome'];
		$data 		 = $_POST['data'];
		$responsavel = $_POST['responsavel'];
		$sql = "UPDATE contato_tb
				SET
				nome = '$nome',
				data = '$data',
				responsavel = '$responsavel'
				WHERE
				id = '$id'
				";		
		$contato = $fusca -> prepare($sql);
		$contato -> execute();
		$fusca = NULL;
		header("Location:tabelaC.php");

	}

?>
<html lang="pt-br">
	
    <head>
        <meta charset="UTF-8">
        <title>Organization Editar</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="css/principal.css">
        <link href="pre/preloader.css" rel="stylesheet">
        <link href="css/microtip.css" rel="stylesheet">
        <link href="css/jquery-ui.css" rel="stylesheet">
        <script src="pre/preloader.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>

    <body>

        <hr>

        <div id="form-nova-tarefa">
            <div class="container">
                <form action="#" method="POST">
                    <center><font face="Verdana">Editar Tarefa</font></center>
                    <br>
                    <div class="input-container">
                        Descrição:
                        <br>
                        <input type="text" name="nome" id="tarefa" value="<?php echo $bolacha['nome']?>">
                        <br>
                        <br> Data:
                        <br>
                        <input type="text" name="data" id="datepicker" value="<?php echo $bolacha['data']?>">
                        <br>
                        <br> Responsável:
                        <br>
                        <input type="text" name="responsavel" id="responsavel" value="<?php echo $bolacha['responsavel']?>">
                        <br>                        
                    </div>
            </div>
            <br>
            <center>
            	<a href="tabelaC.php" class="button" id="btn-cancelar">Cancelar</a>
           	    <a href="inserir.php">
                	<input type="submit" style="border: none" id="btn-adicionar" class="button" value="Salvar" name="salvar"  />
            	</a>
            </center>
            
            </form>

        </div>
        </div>
        </div>
    </body>
</html>