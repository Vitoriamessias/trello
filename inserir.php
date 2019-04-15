<?php
    $nome 			= $_POST['nome'];
    $data 			= $_POST['data'];
    $email 			= $_POST['email'];
    $responsavel    = $_POST['responsavel'];
    $obs		    = $_POST['obs'];
	$id="";

	$sql = "INSERT INTO contato_tb
        (id, nome, data, email, responsavel,obs)
        VALUES
        ('$id','$nome', '$data','$email','$responsavel','$obs')";
    include "conexao.php";
    $contato = $fusca -> prepare($sql);
    $contato -> execute();
    $fusca = NULL;
    header("Location: tabelaC.php");
 ?>