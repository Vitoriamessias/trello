 class Database{
   constructor(collectionName){
      this.collectionName = collectionName;
      this.collection = JSON.parse(localStorage.getItem(collectionName)) || []; 
   }
   
   static get(collectionName){
    return JSON.parse(localStorage.getItem(collectionName)) || [];
   } 

   listAll(){
     return JSON.parse(localStorage.getItem(this.collectionName)) || []; 
   }  
   
   save(obj){
     this.collection.push(obj);
     let dataStr = JSON.stringify(this.collection);
     console.log(dataStr);
     localStorage.setItem(this.collectionName, dataStr);
   }
   
   findBy(attr, value){
     var collection = Object.keys(this.collection).map((key) => this.collection[key]);
     return collection.filter((obj) => { return obj[attr] === value; });
   }
   
 }

class Tarefa{
  constructor(descricao, realizada = false){
    this.descricao = descricao;
    this.realizada = realizada;
  }
}

class TarefasDAO extends Database{
  constructor(){
    super('tarefas');
  }
  
  get tarefasRealizadas(){
    this.findBy('realizada', true);
  }
  
  get tarefasPendentes(){
    this.findBy('realizada', false);
  }
}

/* Controle - Interação */

/* Abrir modal */
document.querySelector('#btn-nova-tarefa').onclick = function(evt){ 
  document.querySelector('#form-nova-tarefa').className += ' opened';
}

/* Salvar tarefa / fechar modal */
document.querySelector('#btn-adicionar').onclick = function(evt){ 
  var textoTarefa = document.querySelector('#tarefa').value;
  var tarefa = new Tarefa(textoTarefa); 
  
  var tarefasDAO = new TarefasDAO('tarefas'); 
  tarefasDAO.save(tarefa);  
  
  // fechar modal
  document.querySelector('#form-nova-tarefa').className = document.querySelector('#form-nova-tarefa').className.replace('opened', '');
  // montar lista de tarefas
  montarListaTarefas();
  // limpar campos de entrada de dados
  document.querySelector('form').reset(); 
}


/* Fechar modal com botão cancelar */
document.querySelector('#btn-cancelar').onclick = function(evt){
  var modal = document.querySelector('#form-nova-tarefa');
  
  modal.className = modal.className.replace('opened', '');  
}

/* Montar lista de tarefas */
function montarListaTarefas(){
  var tarefasDAO = new TarefasDAO('tarefas'); 
  var tarefas = tarefasDAO.listAll(); 
  var elLista = document.querySelector('#lista-tarefas');
  var tplTarefa = document.querySelector('#tpl-tarefa').innerHTML;
  
  elLista.innerHTML = '';
  
  tarefas.forEach((tarefa, index) => {
    let li = Template(tplTarefa, {
      id: 'tarefa-' + index,
      tarefa: tarefa.descricao, 
      realizada: tarefa.realizada
    });
    
    elLista.innerHTML += li;
  });
} 
 
montarListaTarefas();  

/* Função para manipulação de templates */
function Template(tpl, data){
  Object.keys(data).map((key) => {
    tpl = tpl.replace(new RegExp('{{' + key + '}}', 'g'), data[key]);
  });

  return tpl;  
}