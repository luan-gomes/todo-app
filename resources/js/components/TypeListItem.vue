<template>
  <div class="d-flex justify-content-between align-items-center item-container">
    <div class="col-10 item">
      <span class="item-text">{{ type.name }}</span>
    </div>
    <div class="col-2">
      <button
        @click="updateType()"
        type="button"
        class="btn btn-primary btn-sm"
      >
        Editar
      </button>
      <button @click="removeType()" type="button" class="btn btn-danger btn-sm">
        Excluir
      </button>
    </div>
  </div>

   
</template>


<script>
export default {
  props: ["type"],
  methods: {
    removeType() {
      this.$ref.deleteModal.show();
    },
    updateType() {},
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