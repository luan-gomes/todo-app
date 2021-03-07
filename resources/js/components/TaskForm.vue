<template>
    <div class="main-container">
        <h1 class="main-title">Criar Tarefa</h1>
        <div class="component-container">
            <form @submit.prevent="saveTask">
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input
                        v-model="task.description"
                        type="text"
                        class="form-control"
                        id="description"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for="name">Tipo de tarefa</label>
                    <div>
                        <select
                            class="form-select"
                            v-model="task.type_id"
                            required
                        >
                            <option
                                v-for="type in types"
                                :value="type.id"
                                :key="type.id"
                            >
                                {{ type.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deadline">Data Limite</label>
                    <input
                        v-model="task.deadline"
                        type="date"
                        class="form-control"
                        id="deadline"
                        required
                    />
                </div>
                <div class="d-flex flex-row">
                    <div class="p-2">
                        <button type="submit" class="btn btn-success">
                            Salvar
                        </button>
                    </div>
                    <div class="p-2">
                        <button class="btn btn-light">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ["types"],
    data: function() {
        return {
            task: {
                description: "",
                deadline: "",
                type_id: ""
            }
        };
    },

    methods: {
        saveTask() {
            //Método responsável por pegar os dados e enviar para a rota da API responsável por salvá-los
            if (
                this.task.description == "" ||
                this.task.deadline == "" ||
                this.task.type_id == ""
            ) {
                return;
            }

            axios
                .post("/api/task/store", { task: this.task })
                .then(response => {
                    if (response.status == 201) {
                        //retorna pra página de lista
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },

    mounted() {}
};
</script>
