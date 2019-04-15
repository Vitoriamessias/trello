const clone = obj => JSON.parse(JSON.stringify(obj));

let dataj = {
  newTask: "",
  tasks: ["123", "456", "789", "000",
  "AAA", "BBB", "CCC", "ZZZ"].map(dsc => {return { txt: dsc, done: false };}),
  exibir: "all",
  debug: true };


const vroot = new Vue({
  el: "#app",
  data: dataj,
  computed: {
    haTarefas() {return this.tasks.length > 0;},
    haTarefasFiltro() {return this.tasksToList.length > 0;},
    tasksDone() {return this.tasks.filter(t => t.done).length;},
    tasksNotDone() {return this.tasks.filter(t => !t.done).length;},
    tasksToList() {
      if (this.exibir == "all")
      return this.tasks;else
      if (this.exibir == "done")
      return this.tasks.filter(t => t.done);else

      return this.tasks.filter(t => !t.done);
    } },

  methods: {
    addTask() {
      const task = this.newTask;
      if (task.length > 0) {
        this.tasks.push({ txt: task, done: false });
        this.newTask = "";
      }
      novaTarefa.focus();
    },
    removeTask(idx) {
      if (idx > -1)
      this.tasks.splice(idx, 1);
      if (!this.haTarefas) {
        this.exibir = "all";
        novaTarefa.focus();
      }
    } } });