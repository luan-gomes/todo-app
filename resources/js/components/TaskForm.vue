<template>
  <div class="main-container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="main-title">Criar tarefa</h1>
      <buttons-container
        v-on:getTaskList="$emit('showTaskList')"
        v-on:getTypeList="$emit('showTypeList')"
        v-on:getTaskForm="$emit('showTaskForm')"
        v-on:getTypeForm="$emit('showTypeForm')"
      />
    </div>
    <div class="component-container">
      <form @submit.prevent="saveTask">
        <div class="form-group">
          <label for="description">Descrição</label>
          <input
            v-model="task.description"
            type="text"
            class="form-control"
            id="description"
            required
          />
        </div>
        <div class="form-group">
          <label for="name">Tipo de tarefa</label>
          <div>
            <select class="form-select" v-model="task.type_id" required>
              <option v-for="type in types" :value="type.id" :key="type.id">
                {{ type.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="deadline">Data Limite</label>
          <input
            v-model="task.deadline"
            type="date"
            class="form-control"
            id="deadline"
            required
          />
        </div>
        <div class="d-flex flex-row">
          <div class="p-2">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
          <div class="p-2">
            <button class="btn btn-light">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import ButtonsContainer from "./ButtonsContainer.vue";
export default {
  props: ["types"],
  data: function () {
    return {
      task: {
        description: "",
        deadline: "",
        type_id: "",
      },
    };
  },

  methods: {
    saveTask() {
      //Método responsável por pegar os dados e enviar para a rota da API responsável por salvá-los
      if (
        this.task.description == "" ||
        this.task.deadline == "" ||
        this.task.type_id == ""
      ) {
        return;
      }

      axios
        .post("/api/task/store", { task: this.task })
        .then((response) => {
          if (response.status == 201) {
            this.$emit("reloadList");
            this.$emit("showTaskList");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },

  mounted() {},
};
</script>
