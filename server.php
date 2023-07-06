<?php
    /* Recupero il contenuto del file JSON attraverso FILE_GET_CONTENTS */
    $string = file_get_contents('data/todoList.json');
    /* Converto il contenuto in un array per farlo funzionare da PHP */
    $array = json_decode($string, true);

    /* controllo se ho inviato i dati che salvo nel JSON */
    if(isset($_POST['todoItem'])){
        /* pusho l'elemento all'interno dell'array */
        array_push($array, $_POST['todoItem']);
        /* Faccio l'encode dell'array per convertirlo in JSON */
        $array_converted = json_encode($array);

        /* Salvo il contenuto nel file JSON con FILE_PUT_CONTENT */
        file_put_contents('data/todoList.json', $array_converted);
    }

    header('Content-Type: application/json');
    /* Visualizzo l'array con encode */
    echo json_encode($array);
?>