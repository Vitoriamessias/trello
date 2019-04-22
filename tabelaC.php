<?php
  include "conexao.php";
  $sql = "SELECT * FROM contato_tb ORDER BY nome";  
  $contato = $fusca -> prepare($sql);         
  $contato -> execute();                     
  $fusca = null;  

?>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Organization</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/principal.css">
      <link href="pre/preloader.css" rel="stylesheet">
      <link href="css/microtip.css" rel="stylesheet">
      <link href="css/jquery-ui.css" rel="stylesheet">
      <script src="alertify.js"></script>
      <script src="pre/preloader.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  </head>
  
   <body>
   <!--deu-->
    <script type="text/javascript">   
      function toast (){
        alertify.message('Nova tarefa adicionada');
      }
    </script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
<script type="text/javascript">
$('input').click(function(){
$.ajax({
url: 'editar.php',
success: function(data) {
$('div').html(data);
},
beforeSend: function(){
},
complete: function(){
}
});
});
</script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <div id="containerr">
      <div id="Fazer">
          <header>
              <h1>Lista de Tarefas a fazer</h1>
          </header>
      
              <div id="form-nova-tarefa" class="modal">
                  <div class="container">
                      <form action="inserir.php" method="POST">
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
                          <br>
                          <a href="#" class="button" id="btn-cancelar">Cancelar</a>
                          <a href="inserir.php">
                              <input type="submit" style="border: none" id="btn-adicionar" class="button" value="Salvar" name="salvar" onclick="toast()"/>
                           </a>
                      </form>

                  </div>
              </div>

              <div id="container-tarefas">
                <table border="1">
      <tr>
        <th>Descrição</th>
        <th>Data</th>
        <th>Responsável</th>
        <th>Ações</th>
      </tr>
      <?PHP
        
        foreach($contato as $bolacha){
        //Atribuindo valores capturados da tabela
          $id        = $bolacha["id"];
          $nome      = $bolacha['nome'];
          $data     = $bolacha['data'];
          $responsavel       = $bolacha['responsavel'];  
          }
        //Montando a tabela com os valores recebidos
          echo "<tr>";
          echo "<td>".$nome."</td>";
          echo "<td>".date("d/m/Y",strtotime($data))."</td>";
          echo "<td>".$responsavel."</td>";
          echo "<td align='center'>
            <a href='excluir.php?id=$id&nome=$nome'><img src='lixo.png' title='Excluir $nome'>
            </a>
            &nbsp;&nbsp;
            <a href='editar.php?id=$id&nome=$nome'><img src='edit.png' title='Editar $nome'></a>
            &nbsp;&nbsp;
            <a href='?id=$id&nome=$nome'><img src='checked.png' title='Check $nome'></a> 
            </td>";
          echo "</tr>"; 
        
      ?>
    </table>
                  
              </div>

              <div class="controls">
                  <a href="#"  aria-label="Adicionar nova tarefa" data-microtip-position="up" role="tooltip"id="btn-nova-tarefa" class="add-button"><i class="material-icons">add</i></a>
              </div>
          
      </div>
        <div id="Fazendo">
            <header>
                <h1>Lista de Tarefas fazendo</h1>
            </header>
             <table border="1">
      <tr>
        <th>Descrição</th>
        <th>Data</th>
        <th>Responsável</th>
        <th>Ações</th>
      </tr>
      <?PHP
        foreach($contato as $bolacha){
        //Atribuindo valores capturados da tabela
          $id        = $bolacha["id"];
          $nome      = $bolacha['nome'];
          $data     = $bolacha['data'];
          $responsavel       = $bolacha['responsavel'];  
          }
        //Montando a tabela com os valores recebidos
          echo "<tr>";
          echo "<td>".$nome."</td>";
          echo "<td>".date("d/m/Y",strtotime($data))."</td>";
          echo "<td>".$responsavel."</td>";
          echo "<td align='center'>
            <a href='agenda_excluir.php?id=$id&nome=$nome'><img src='lixo.png' title='Excluir $nome'>
            </a>
            &nbsp;&nbsp;
            <a href='agenda_editar.php?id=$id&nome=$nome'><img src='edit.png' title='Editar $nome'></a>
            &nbsp;&nbsp;
            <a href='agenda_editar.php?id=$id&nome=$nome'><img src='checked.png' title='Check $nome'></a> 
            </td>";
          echo "</tr>"; 
        
      ?>
    </table>

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
             <table border="1">
      <tr>
        <th>Descrição</th>
        <th>Data</th>
        <th>Responsável</th>
        <th>Ações</th>
      </tr>
      <?PHP
        foreach($contato as $bolacha){
        //Atribuindo valores capturados da tabela
          $id        = $bolacha["id"];
          $nome      = $bolacha['nome'];
          $data     = $bolacha['data'];
          $responsavel       = $bolacha['responsavel'];  
          }
        //Montando a tabela com os valores recebidos
          echo "<tr>";
          echo "<td>".$nome."</td>";
          echo "<td>".date("d/m/Y",strtotime($data))."</td>";
          echo "<td>".$responsavel."</td>";
          echo "<td align='center'>
            <a href='agenda_excluir.php?id=$id&nome=$nome'><img src='lixo.png' title='Excluir $nome'>
            </a>
            &nbsp;&nbsp;
            <a href='agenda_editar.php?id=$id&nome=$nome'><img src='edit.png' title='Editar $nome'></a>
            &nbsp;&nbsp;
            <a href='agenda_editar.php?id=$id&nome=$nome'><img src='checked.png' title='Check $nome'></a> 
            </td>";
          echo "</tr>"; 
        
      ?>
    </table>

            <main>
                <div id="container-tarefas">
                    <ul id="lista-tarefas">
                    </ul>
                </div>
            </main>
        </div>
        </div>
     </div>

     
      <script>
        $( "#datepicker" ).datepicker({
          inline: true
        });
      </script>
      <script src="js/principal.js"></script>
      <script src="external/jquery/jquery.js"></script>
      <script src="js/jquery-ui.js"></script>

  </body>

</html>

