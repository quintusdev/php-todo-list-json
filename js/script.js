const { createApp } = Vue;

// Crea un'applicazione Vue
createApp({
    data() {
        return {
            /* Inizializza le variabili vuote */
            todoItem: '', // Rappresenta il valore di un nuovo elemento da aggiungere
            todoList: [], // Conserva la lista degli elementi della lista TODO ottenuta dal server
            apiUrl: 'server.php' // Specifica l'URL del file server.php che gestisce le richieste API
        };
    },
    mounted() {
        /* Effettua una chiamata AXIOS per recuperare i dati */
        axios.get(this.apiUrl).then((response) => {
            this.todoList = response.data;
        });
    },
    methods: {
        /* Funzione per aggiornare la lista con i nuovi elementi */
        updateList() {
            const data = {
                todoItem: this.todoItem
            };

            /* Effettua una chiamata AXIOS di tipo POST per inserire il nuovo task nella lista esistente */
            axios
                .post(this.apiUrl, data, {
                    /* Imposta l'intestazione della richiesta per salvare i dati nel file e aggiornarlo */
                    headers: { 'Content-Type': 'multipart/form-data' }
                })
                .then((response) => {
                    this.todoItem = '';
                    this.todoList = response.data;
                });
        },
        // Metodo per cambiare il valore di done dell'elemento con indice X da FALSE a TRUE
        changeTaskStatus(index) {
            this.todoList[index].done = !this.todoList[index].done;
        },
        // Metodo per cancellare la task nella posizione X dell'array con SPLICE
        deleteTask(index) {
            const data = new FormData();
            data.append('deleteTask', index);

            axios.get(this.apiUrl).then((response) => {
                this.todoList = response.data;
            });
        }
    }
}).mount('#app');
