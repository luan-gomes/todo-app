<template>
  <div>
    <button @click="getTaskList()" class="btn btn-light btn-sm">Tarefas</button>
    <button @click="getTaskForm()" class="btn btn-primary btn-sm">
      + Criar tarefa
    </button>
    <button @click="getTypeList()" class="btn btn-light btn-sm">
      Tipos de tarefas
    </button>
    <button @click="getTypeForm()" class="btn btn-primary btn-sm">
      + Criar Tipo
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    getTaskList() {
      this.$emit("getTaskList");
    },
    getTypeList() {
      this.$emit("getTypeList");
    },
    getTaskForm() {
      this.$emit("getTaskForm");
    },
    getTypeForm() {
      this.$emit("getTypeForm");
    },
  },
};
</script>