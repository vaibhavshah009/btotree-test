<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 task-list">
                <div class="box">
                    <h2 class="mt-3 mb-3">My tasks</h2>
                    <hr>
                    <div class="input-group mb-5">
                        <input class="form-control" type="text" placeholder="New task" v-model="task.body"  v-on:keyup.enter="createTask()">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" @click="createTask()">
                                Add task
                            </button>
                        </div>
                    </div>
                    <ul class="list-group" v-for="task in list">
                        <li class="list-group-item mb-2">
                            <p class="mb-0" v-if="task !== editingTask" @dblclick="editTask(task)" v-bind:title="message">
                                {{ task.body }}
                            </p>
                            <input class="form-control" v-if="task === editingTask" v-autofocus @keyup.enter="endEditing(task)" @blur="endEditing(task)" type="text" placeholder="New task" v-model="task.body">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        directives: {
            'autofocus': {
                inserted(el) {
                    el.focus();
                }
            }
        },
        data() {
            return {
                message: 'Double click for editing.',
                list: [],
                task: {
                    id: '',
                    body: '',
                    archive: ''
                },
                editingTask: {},
                activeItem: 'current'
            }
        },
        created() {
            this.fetchTaskList();
        },
        methods: {
            fetchTaskList(archive = null) {
                var url = 'all_tasks';
                axios.get(url).then(result => {
                    this.list = result.data
                });
            },
            createTask() {
                axios.post('create_task', this.task).then(result => {
                    this.task.body = '';
                    this.fetchTaskList();
                }).catch(err => {
                    console.log(err);
                });
            },
            editTask(task) {
                this.editingTask = task;
            },
            endEditing(task) {
                this.editingTask = {};
                if (task.body.trim() === '') {
                    this.deleteTask(task.id);
                } else {
                    axios.post('edit_task', task).then(result => {
                        console.log('access!')
                    }).catch(err => {
                        console.log(err);
                    });
                }
            }
        }
    }
</script>