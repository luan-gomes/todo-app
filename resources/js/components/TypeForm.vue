<template>
  <div class="main-container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="main-title">Criar Tipo de Tarefa</h1>
      <buttons-container
        v-on:getTaskList="$emit('showTaskList')"
        v-on:getTypeList="$emit('showTypeList')"
        v-on:getTaskForm="$emit('showTaskForm')"
        v-on:getTypeForm="$emit('showTypeForm')"
      />
    </div>
    <div class="component-container">
      <form @submit.prevent="saveType">
        <div class="form-group">
          <label for="name">Nome do tipo de tarefa</label>
          <input
            v-model="type.name"
            type="text"
            class="form-control"
            id="name"
            required
          />
        </div>
        <div class="d-flex flex-row">
          <div class="p-2">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
          <div class="p-2">
            <button @click="$emit('showTypeList')" class="btn btn-light">
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import ButtonsContainer from "./ButtonsContainer.vue";
export default {
  data: function () {
    return {
      type: {
        name: "",
      },
    };
  },

  methods: {
    saveType() {
      //Método responsável por pegar os dados e enviar para a rota da API responsável por salvá-los
      if (this.type.name == "") {
        return;
      }

      axios
        .post("/api/type/store", { type: this.type })
        .then((response) => {
          if (response.status == 201) {
            this.$emit("reloadList");
            this.$emit("showTypeList");
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
