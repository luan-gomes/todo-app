<template>
  <div class="d-flex justify-content-center">
    <!--  <type-form></type-form>-->
    <type-list :types="types" />
  </div>
</template>

<script>
import TypeForm from "./TypeForm.vue";
import TypeList from "./TypeList.vue";
export default {
  components: { TypeForm, TypeList },
  data: function () {
    return {
      types: [],
    };
  },
  methods: {
    getTypeList() {
      axios
        .get("api/types")
        .then((response) => {
          this.types = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.getTypeList();
  },
};
</script>
