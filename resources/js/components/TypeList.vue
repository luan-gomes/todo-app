<template>
  <div class="main-container">
    <h1 class="main-title">Tipos de tarefas</h1>
    <div class="component-container">
      <div v-for="(type, index) in types" :key="index">
        <type-list-item :type="type" />
      </div>
    </div>
  </div>
</template>

<script>
import TypeListItem from "./TypeListItem.vue";
export default {
  props: ["types"],
  components: { TypeListItem },
};
</script>
