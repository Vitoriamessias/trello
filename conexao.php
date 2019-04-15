<?php
	try{																		//try           = tipo um if
		$fusca= new PDO("mysql:host=localhost;dbname=trello_bd","root",""); 	//$fusca        = variavel
																				//new PDO       = Novo 
	}																			//echo          = Mostrar na tela 	
	catch(PDOException $e){														//catch         = tipo um else						
		echo $e -> getMessage();												//PDO exception = caso ocorra um ex.				
	}
	
?>