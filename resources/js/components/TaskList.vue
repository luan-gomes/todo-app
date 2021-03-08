<template>
  <div class="main-container">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="main-title">Tarefa</h1>
      <buttons-container
        v-on:getTaskList="$emit('showTaskList')"
        v-on:getTypeList="$emit('showTypeList')"
        v-on:getTaskForm="$emit('showTaskForm')"
        v-on:getTypeForm="$emit('showTypeForm')"
      />
    </div>

    <div class="component-container">
      <div>
        <span>Filtro</span>
        <select
          class="form-select"
          v-model="filter"
          required
          @change="getFiltered()"
        >
          <option value="all">Todos</option>
          <option v-for="type in types" :value="type.id" :key="type.id">
            {{ type.name }}
          </option>
        </select>
      </div>
      <div v-for="(task, index) in tasks" :key="index">
        <task-list-item
          :task="task"
          :types="types"
          v-on:taskUpdated="$emit('reloadList')"
          v-on:taskDeletedSuccessfully="$emit('reloadList')"
        />
      </div>
    </div>
  </div>
</template>

<script>
import TaskListItem from "./TaskListItem.vue";
import ButtonsContainer from "./ButtonsContainer.vue";
export default {
  data() {
    return {
      filter: "",
    };
  },
  props: ["tasks", "types"],
  components: { TaskListItem },
  methods: {
    getFiltered() {
      axios
        .get("api/task/filtered/" + this.filter)
        .then((response) => {
          this.tasks = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
