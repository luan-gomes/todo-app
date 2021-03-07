<template>
    <div class="main-container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="main-title">Tarefas</h1>
            <div>
                <button class="btn btn-light btn-sm">Tipos de tarefas</button>
                <button class="btn btn-primary btn-sm">+ Criar tarefa</button>
            </div>
        </div>
        <div class="component-container">
            <div v-for="(task, index) in tasks" :key="index">
                <task-list-item
                    :task="task"
                    v-on:taskCompletedStatusChange="$emit('reloadList')"
                    v-on:taskDeletedSuccessfully="$emit('reloadList')"
                />
            </div>
        </div>
    </div>
</template>

<script>
import TaskListItem from "./TaskListItem.vue";
export default {
    props: ["tasks"],
    components: { TaskListItem }
};
</script>
