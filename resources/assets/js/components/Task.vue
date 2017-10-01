<template>
    <article class="media">
        <div class="media-content">
            <div class="content is-vcentered">
                <div class="columns">
                    <div class="column is-8">
                        <p v-if="!edit">{{ task.title }}</p>
                        <input type="text" v-model="editForm.title" v-if="edit" class="input" required />
                    </div>
                    <div class="column is-4">
                        <a class="button is-info" @click="editTask" v-if="!edit">Editar</a>
                        <a class="button is-info" @click="cancelEdit" v-if="edit">Cancelar</a>
                        <a class="button is-primary" @click="updatedTask(task, editForm)" v-if="edit">Actualizar</a>
                        <a class="button is-danger" @click="deleteTask(task)" v-if="!edit">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import axios from 'Axios';
    export default {
        props: ['task'],
        data() {
            return {
                edit: false,
                editForm: {
                    title: ''
                }
            }
        },
        methods: {
            editTask() {
                this.edit = true;
                this.editForm.title = this.task.title;
            },
            cancelEdit() {
                this.edit = false;
                this.editForm.title = '';
            },
            updatedTask(oldTask, newTask) {
                const url = '/api/tasks/' + oldTask.id;
                axios.patch(url, newTask).then(response => {
                    this.$emit('update-task');
                    this.cancelEdit();
                    console.log(response.data.message);
                });
            },
            deleteTask(task){
                axios.delete('/api/tasks/' + task.id).then(response=>{
                    this.$emit('delete-task');
                    console.log(response.data.message);
                });
            }
        }
    }
</script>
