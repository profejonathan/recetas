<?php

    // Recibe los datos por POST, valida campos e insertar en la Db
    if ( isset($_POST['nombre']) && isset( $_POST['idCategoria']) 
            && isset($_POST['ingredientes']) && isset($_POST['pasos'])){
        
        $nombre = $_POST['nombre'];
        $idCategoria = $_POST['idCategoria'];
        $ingredientes = $_POST['ingredientes'];
        $pasos = $_POST['pasos'];

        echo($nombre);
        echo('<br>');
        echo($idCategoria);
        echo('<br>');

        echo($ingredientes);
        echo('<br>');

        echo($pasos);


    }


?>