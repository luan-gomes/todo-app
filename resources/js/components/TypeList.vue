<template>
  <div class="main-container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="main-title">Tipos de tarefas</h1>
      <buttons-container
        v-on:getTaskList="$emit('showTaskList')"
        v-on:getTypeList="$emit('showTypeList')"
        v-on:getTaskForm="$emit('showTaskForm')"
        v-on:getTypeForm="$emit('showTypeForm')"
      />
    </div>
    <div class="component-container">
      <b-alert
        variant="danger"
        dismissible
        fade
        :show="showDismissibleAlert"
        @dismissed="showDismissibleAlert = false"
      >
        Este tipo tem tarefas vinculadas a ele. Você precisa excluí-las
        primeiro.
      </b-alert>
      <div v-for="(type, index) in types" :key="index">
        <type-list-item
          :type="type"
          v-on:typeChange="$emit('reloadList')"
          v-on:typeHasTasks="showAlert()"
        />
      </div>
    </div>
  </div>
</template>

<script>
import TypeListItem from "./TypeListItem.vue";
import ButtonsContainer from "./ButtonsContainer.vue";
export default {
  data() {
    return {
      showDismissibleAlert: false,
    };
  },
  props: ["types"],
  components: { TypeListItem },
  methods: {
    showAlert() {
      this.showDismissibleAlert = true;
    },
  },
};
</script>
