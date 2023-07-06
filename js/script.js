const { createApp } = Vue;

createApp({
    data() {
        return {
            /* inizializzo le variabili vuote */
            todoItem: '',
            todoList: null,
            /* Imposto come apiURL il file che contiene i dati */
            apiUrl: 'server.php'
        }
    },
    mounted() {
        /* effettuo la chiamata AXIOS per recuperare i dati */
        axios.get(this.apiUrl).then((response) => {
            this.todoList = response.data;
        });
    },
    methods: {
        /* Faccio la funzione per aggiornare la lista con i nuovi elementi */
        updateList() {
            const data = {
                todoItem: this.todoItem
            }

            /* Effettuo chiamata AXIOS POST per inserire la task aggiunta in quella già presente */
            axios.post(this.apiUrl, data, {
                /* con questa funzione salvo i dati nel file aggiornando quello esistente */
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoItem = '';
                this.todoList = response.data;
            });
        }
    },
}).mount('#app');