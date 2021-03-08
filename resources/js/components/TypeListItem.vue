<template>
  <div class="d-flex justify-content-between align-items-center item-container">
    <div class="col-10 item">
      <span class="item-text">{{ type.name }}</span>
    </div>
    <div class="col-2">
      <button
        @click="showEditModal()"
        type="button"
        class="btn btn-primary btn-sm"
      >
        Editar
      </button>
      <button @click="showModal()" type="button" class="btn btn-danger btn-sm">
        Excluir
      </button>
    </div>
    <b-modal ref="my-modal" hide-footer>
      <div class="d-block text-center">
        <span>Deseja excluir este Tipo de Tarefa?</span>
      </div>
      <b-button class="mt-2" variant="light" block @click="hideModal"
        >Não</b-button
      >
      <b-button class="mt-3" variant="primary" block @click="removeType"
        >Sim</b-button
      >
    </b-modal>

    <b-modal
      id="edit-modal"
      size="xl"
      ref="edit-modal"
      title="Editar tipo de tarefa"
      @show="showEditModal"
      @hidden="hideEditModal"
      @ok="updateType"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          label="Nome"
          label-for="name-input"
          invalid-feedback="Campo obrigatório"
        >
          <b-form-input
            id="name-input"
            v-model="type.name"
            required
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>
  </div>
</template>

<script>
export default {
  props: ["type"],
  methods: {
    showModal() {
      this.$refs["my-modal"].show();
    },
    hideModal() {
      this.$refs["my-modal"].hide();
    },
    removeType() {
      axios
        .delete("api/type/" + this.type.id)
        .then((response) => {
          this.$emit("typeUpdated");
          this.$refs["my-modal"].hide();
        })
        .catch((error) => {
          this.$emit("typeHasTasks");
          this.$refs["my-modal"].hide();
          console.log(error);
        });
    },
    updateType() {
      axios
        .put("api/type/" + this.type.id, { type: this.type })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("typeUpdated");
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
  box-sizing: border-box;
  padding: 5px 0;
}
</style>
