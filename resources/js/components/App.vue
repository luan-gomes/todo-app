<template>
    <div class="container-app">
        <div class="d-flex justify-content-center">
            <!--  <type-form></type-form>-->
            <!--<type-list
                :types="types"
                v-on:reloadList="getTypeList()"
            ></type-list>-->
            <!--<task-form :types="types"></task-form>-->
            <task-list
                :tasks="tasks"
                v-on:reloadList="getTaskList()"
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
    data: function() {
        return {
            types: [],
            tasks: []
        };
    },
    methods: {
        getTypeList() {
            axios
                .get("api/types")
                .then(response => {
                    this.types = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getTaskList() {
            axios
                .get("api/tasks")
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getTypeList();
        this.getTaskList();
    }
};
</script>
