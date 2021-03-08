<template>
  <div class="container-app">
    <div class="d-flex flex-direction-column justify-content-center">
      <type-form
        v-show="isTypeFormShowed"
        v-on:reloadList="getTypeList()"
        v-on:showTaskList="exibTaskList()"
        v-on:showTypeList="exibTypeList()"
        v-on:showTaskForm="exibTaskForm()"
        v-on:showTypeForm="exibTypeForm()"
      ></type-form>
      <type-list
        v-show="isTypeListShowed"
        :types="types"
        v-on:reloadList="getTypeList()"
        v-on:showTaskList="exibTaskList()"
        v-on:showTypeList="exibTypeList()"
        v-on:showTaskForm="exibTaskForm()"
        v-on:showTypeForm="exibTypeForm()"
      ></type-list>
      <task-form
        v-show="isTaskFormShowed"
        :types="types"
        v-on:reloadList="getTaskList()"
        v-on:showTaskList="exibTaskList()"
        v-on:showTypeList="exibTypeList()"
        v-on:showTaskForm="exibTaskForm()"
        v-on:showTypeForm="exibTypeForm()"
      ></task-form>
      <task-list
        v-show="isTaskListShowed"
        :tasks="tasks"
        :types="types"
        v-on:reloadList="getTaskList()"
        v-on:showTaskList="exibTaskList()"
        v-on:showTypeList="exibTypeList()"
        v-on:showTaskForm="exibTaskForm()"
        v-on:showTypeForm="exibTypeForm()"
      ></task-list>
    </div>
  </div>
</template>

<script>
import TaskForm from "./TaskForm.vue";
import TypeForm from "./TypeForm.vue";
import TypeList from "./TypeList.vue";
import TaskList from "./TaskList.vue";
export default {
  components: { TypeForm, TypeList, TaskForm, TaskList },
  data: function () {
    return {
      types: [],
      tasks: [],
      isTaskListShowed: false,
      isTypeListShowed: false,
      isTaskFormShowed: false,
      isTypeFormShowed: false,
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
    getTaskList() {
      axios
        .get("api/tasks")
        .then((response) => {
          this.tasks = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    exibTaskList() {
      console.log("exibTaskList");
      this.isTaskListShowed = true;
      this.isTypeListShowed = false;
      this.isTaskFormShowed = false;
      this.isTypeFormShowed = false;
    },
    exibTypeList() {
      console.log("exibTypeList");
      this.isTaskListShowed = false;
      this.isTypeListShowed = true;
      this.isTaskFormShowed = false;
      this.isTypeFormShowed = false;
    },
    exibTaskForm() {
      console.log("exibTaskForm");
      this.isTaskListShowed = false;
      this.isTypeListShowed = false;
      this.isTaskFormShowed = true;
      this.isTypeFormShowed = false;
    },
    exibTypeForm() {
      console.log("exibTypeForm");
      this.isTaskListShowed = false;
      this.isTypeListShowed = false;
      this.isTaskFormShowed = false;
      this.isTypeFormShowed = true;
    },
  },
  created() {
    this.getTypeList();
    this.getTaskList();
    this.exibTaskList();
  },
};
</script>
