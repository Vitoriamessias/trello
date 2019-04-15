window.onload = function() {
  document.getElementsByTagName('body')[0].style.display = "";
}

var app = angular.module('app', ['LocalStorageModule']);

app.controller('bodyController', function ($scope, localStorageService, $filter) {
  $scope.habilitadoParaAdicionar = false;
  
  if (!localStorageService.cookie.get('tarefas')) {localStorageService.cookie.set('tarefas', demo);}
  
  $scope.tarefas = localStorageService.cookie.get('tarefas');
  $scope.selTarefa = function(item) {item.ativo = item.ativo == 'nwr' ? '' : 'nwr';}
  $scope.habilitaAdicionar = function(){$scope.habilitadoParaAdicionar = true;}
  $scope.desabilitaAdicionar = function() {$scope.habilitadoParaAdicionar = false}
  
  $scope.adicionarTarefa = function() {
    if($scope.descricao && $scope.descricao != ''){
      $scope.erroDescricao = false;
      $scope.habilitadoParaAdicionar = false    
      $scope.tarefas.push({status: 'pendente', numero: $scope.tarefas.length + 1,prioridade: $scope.prioridadeSelected.toString() ,ativo: 'nwr', descricao: $scope.descricao});
      $scope.descricao = '';
      return localStorageService.cookie.set('tarefas', $scope.tarefas);
    }
  }
  
  $scope.lc = localStorageService.cookie.clearAll();
  
  $scope.alterarStatus = function(tarefa) {
    switch(tarefa.status) {
      case 'concluido':tarefa.status = 'pendente'; break;
      case 'pendente': tarefa.status = 'em andamento'; break;      
      case 'em andamento':tarefa.status = 'concluido'; break;
    }
  }
    
  $scope.removerTarefasConcluidas = function() {
    $scope.tarefas = $filter('filter')($scope.tarefas, {status: '!concluido'});
    return localStorageService.cookie.set('tarefas', $scope.tarefas);
  }
  
});

var demo = [
  {status: 'pendente', prioridade: '3', numero: 1, ativo: 'nwr', descricao: 'Isso é uma demonstração!'},
  {status: 'em andamento', prioridade: '3', numero: 2, ativo: 'nwr', descricao: 'Clique aqui para ver o conteudo completo: Refazer todos os projetos realizados então aplicar a melhoria onde cada tela deve ganhar 10% de velocidade, melhorando assim a performace de testes.'},
  {status: 'concluido', prioridade: '1', numero: 3, ativo: 'nwr', descricao: 'Vermelho: prioridade alta, amarelo: média, verde ... deixa para depois.'},
  {status: 'concluido', prioridade: '2', numero: 3, ativo: 'nwr', descricao: 'Mude o status clicando nele...'}];

app.config(function (localStorageServiceProvider) {
  localStorageServiceProvider
    .setStorageCookie(0, '/');
});