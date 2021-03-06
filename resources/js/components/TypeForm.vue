<template>
  <form>
    <div class="form-group">
      <label for="name">Nome do tipo de tarefa</label>
      <input v-model="form.name" type="text" class="form-control" id="name" />
      <small id="emailHelp" class="form-text text-muted"
        >Nunca vamos compartilhar seu email, com ninguém.</small
      >
    </div>
    <div class="row">
      <div class="col">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
      <div class="col">
        <button class="btn btn-light">Cancelar</button>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        name: "",
      }),
    };
  },
  mounted() {},
};
</script>