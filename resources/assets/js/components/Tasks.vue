<template>
    <div>
        <div class="field has-addons">
            <p class="column is-10 control">
                <input class="input" type="text" v-model="task.title" placeholder="Escribe aquí la nueva tarea" />
            </p>
            <p class="column control">
                <button class="button" @click="createTask">Nueva Tarea</button>
            </p>
        </div>
        <div class="box">
            <task v-for="task in tasks" :task="task" :key="task.id" v-on:delete-task="fetchTasks" v-on:update-task="fetchTasks"></task>
        </div>
    </div>
</template>

<script>
    import axios from 'Axios';
    import Task from './Task.vue';

    export default {
        created() {
            this.fetchTasks();
        },
        data() {
            return {
                tasks: [],
                task: {
                    title: ''
                }
            }
        },
        components: {
            Task
        },
        methods: {
            fetchTasks() {
                const url = 'api/tasks';
                axios.get(url).then(response => {
                    this.tasks = response.data;
                });
            },
            createTask() {
                const url = 'api/tasks';
                axios.post(url, this.task).then(response => {
                    this.task.title = '';
                    this.fetchTasks();
                    console.log(response.data.message);
                });
            }
        }
    }
</script>
