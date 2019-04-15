<!DOCTYPE html> 
<?php
  if(ISSET($_POST["salvar"])){
    $nome         = $_POST['nome'];     
    $data         = $_POST['data'];      
    $email        = $_POST['email'];        
    $responsavel  = $_POST['responsavel'];  
    $obs          = $_POST['obs'];  
    $id_tarefa   = "";

    echo"$nome"."<br>";          
    echo"$data"."<br>";            
    echo"$email"."<br>";              
    echo"$responsavel"."<br>";           
    echo"$obs"."<br>";         
    }    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Organization</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="css/principal.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

    <body>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <div class="container">
        <div id="Fazer">
            <header>
                <h1>Lista de Tarefas a fazer</h1>
            </header>

            <main>
                <form action="#" method="POST">
                    <div id="form-nova-tarefa" class="modal">
                        
                            <form>
                                <center><font face="Verdana">Nova Tarefa</font></center>
                                <br>
                                <div class="input-container">
                                    <input type="text" name="nome" id="tarefa" placeholder="Tarefa" required="required" />
                                    <br>
                                    <input type="text" name="data" id="datepicker" placeholder="Data de entrega" required="required" />
                                    <br>
                                    <input type="email" name="email" id="email" placeholder="E-mail do Responsável" required="required" />
                                    <br>
                                    <input type="text" name="responsavel" id="responsavel" placeholder="Responsável pela tarefa" required="required" />
                                    <br>
                                    <input type="text" name="obs" id="obs" placeholder="Observação" required="required" />
                                </div>
                            </form>

                            <div class="modal-controls">
                                <a href="#" class="button" id="btn-cancelar">Cancelar</a>
                                <a href="">
                                    <input type="submit" style="border: none" id="btn-adicionar" class="button" value="Salvar" name="salvar" />
                                </a>

                            </div>
                        
                    </div>

                    <div id="container-tarefas">
                        <ul id="lista-tarefas">
                        </ul>
                    </div>

                    <div class="controls">
                        <a href="" id="btn-nova-tarefa" class="add-button"><i class="material-icons">add</i></a>
                    </div>
                </form>
            </main>
        </div>
        
        <div id="Fazendo">
            <header>
                <h1>Lista de Tarefas fazendo</h1>
            </header>

            <main>
                <div id="container-tarefas">
                    <ul id="lista-tarefas">
                    </ul>
                </div>
            </main>
        </div>

        <div id="Feitas">
            <header>
                <h1>Lista de Tarefas feitas</h1>
            </header>

            <main>
                <div id="container-tarefas">
                    <ul id="lista-tarefas">
                    </ul>
                </div>
            </main>
        </div>
        </div>

        <script type="text/template" id="tpl-tarefa">
            <li>
                <div class="item-tarefa">
                    <input type="checkbox" id="{{id}}">
                    <label for="{{id}}">{{tarefa}}</label>
                </div>
            </li>
        </script>
        <script src="js/principal.js"></script>
  </body>
</html>
