<template>
  <div class="d-flex align-items-center">
    <div class="check-completed">
      <input
        class="form-check-input"
        type="checkbox"
        v-model="task.completed"
        @change="updateCompleted()"
      />
    </div>
    <div class="d-flex align-items-center item-container col-11">
      <div class="col-2 item">
        <span class="item-text">{{ task.deadline }}</span>
      </div>

      <div class="col-2 item">
        <span class="item-text">{{ task.type_id }}</span>
      </div>

      <div class="col-5 item">
        <span class="item-text">{{ task.description }}</span>
      </div>

      <div class="col-2 item">
        <button
          @click="showEditModal()"
          type="button"
          class="btn btn-primary btn-sm"
        >
          Editar
        </button>
        <button
          @click="showModal()"
          type="button"
          class="btn btn-danger btn-sm"
        >
          Excluir
        </button>
      </div>
    </div>
    <b-modal ref="my-modal" hide-footer>
      <div class="d-block text-center">
        <span>Deseja excluir este Tipo de Tarefa?</span>
      </div>
      <b-button class="mt-2" variant="light" block @click="hideModal"
        >Não</b-button
      >
      <b-button class="mt-3" variant="primary" block @click="removeTask"
        >Sim</b-button
      >
    </b-modal>

    <b-modal
      id="edit-modal"
      size="xl"
      ref="edit-modal"
      title="Editar tarefa"
      @show="showEditModal"
      @hidden="hideEditModal"
      @ok="updateTask"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          label="Descrição"
          label-for="description-input"
          invalid-feedback="Campo obrigatório"
        >
          <b-form-input
            id="description-input"
            v-model="task.description"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-select v-model="task.type_id" class="mb-3">
          <b-form-select-option
            v-for="type in types"
            :value="type.id"
            :key="type.id"
            >{{ type.name }}</b-form-select-option
          >
        </b-form-select>

        <b-form-group
          label="Data limite"
          label-for="deadline-input"
          invalid-feedback="Campo obrigatório"
        >
          <b-form-input
            id="deadline-input"
            v-model="task.deadline"
            required
            type="date"
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ["task", "types"],
  methods: {
    showModal() {
      this.$refs["my-modal"].show();
    },
    hideModal() {
      this.$refs["my-modal"].hide();
    },
    removeTask() {
      axios
        .delete("api/task/" + this.task.id)
        .then((response) => {
          this.$refs["my-modal"].hide();
          this.$emit("taksDeletedSuccessfully");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateTask() {
      axios
        .put("api/task/" + this.task.id, { task: this.task })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("taskUpdated");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateCompleted() {
      axios
        .put("api/task/" + this.task.id, { task: this.task })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("taskUpdated");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    showEditModal() {
      this.$refs["edit-modal"].show();
    },
    hideEditModal() {
      this.$refs["edit-modal"].hide();
    },
  },
};
</script>

<style scoped>
.item-container {
  border: 2px solid #b4b4b4;
  margin: 10px 0;
}
.check-completed {
  width: 25px;
  height: 25px;
  margin: 0 10px;
}
.item {
  box-sizing: border-box;
  padding: 5px 0;
}
</style>
