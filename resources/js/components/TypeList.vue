<template>
    <div class="main-container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="main-title">Tipos de tarefas</h1>
            <div>
                <button class="btn btn-primary btn-sm">+ Criar Tipo</button>
            </div>
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
export default {
    data() {
        return {
            showDismissibleAlert: false
        };
    },
    props: ["types"],
    components: { TypeListItem },
    methods: {
        showAlert() {
            this.showDismissibleAlert = true;
        }
    }
};
</script>
