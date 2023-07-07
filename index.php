<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- link fortawsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <!-- link bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- link CSS-->
        <link rel="stylesheet" href="./css/style.css" />
        <title>PHP ToDo List JSON</title>
    </head>

    <body>
        <div class="general">
            <div id="app">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- elemento principale che contiene la lista -->
                            <h2 class="display-1 text-light"><strong>To do List PHP</strong></h2>
                            <ul class="list-group list-group-flush border border-1 rounded">
                                <li v-for="(item, index) in todoList" :key="index" class="list-group-item d-flex justify-content-between align-items-center">
                                    <div :class="item.done === true ? 'item-done' : '' ">
                                        {{ item.text }}
                                    </div>
                                    <div>
                                        <!-- Pulsante di check o croce -->
                                        <button class="me-1 btn btn-sm" :class="item.done ? 'btn-dark' : 'btn-success'" @click="changeTaskStatus(index)">
                                            <i class="fas" :class="item.done ? 'fa-x' : 'fa-check'"></i>
                                        </button>
                                        <!-- Pulsante per rimuovere l'attività -->
                                        <button class="btn btn-sm btn-danger" @click="deleteTask(index)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" @keyup.enter="updateList" v-model="todoItem" placeholder="Task da aggiungere" class="form-control mt-2">
                                <button type="button" @click="updateList" class="btn btn-success mt-2" id="button-add">Aggiungi Task</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- link axios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- link js bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- link script vue js-->
        <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
        <!--link script JS-->
        <script text="text/javascript" src="./js/script.js"></script>
    </body>
</html>