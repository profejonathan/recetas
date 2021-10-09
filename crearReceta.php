<?php
    require_once('app/Receta.php');


    // Recibe los datos por POST, valida campos e insertar en la Db
    if ( isset($_POST['nombre']) && isset( $_POST['idCategoria']) 
            && isset($_POST['ingredientes']) && isset($_POST['pasos'])){
                        // Cuando se desarrolle el login
        $idUsuario = 1;  // Modificar para que tomo el id del usuario logueado
        $idPais = 1; // modificar

        $nombre = $_POST['nombre'];
        $idCategoria = $_POST['idCategoria'];
        $ingredientes = $_POST['ingredientes'];
        $pasos = $_POST['pasos'];

        $receta = new Receta();
        $receta->setIdUsuario($idUsuario);
        $receta->setIdPais($idPais);
        $receta->setIdCategoria($idCategoria);
        $receta->setNombre($nombre);
        $receta->setIngredientes($ingredientes);
        $receta->setPasos($pasos);

        $receta->crear();

        echo("Receta Guardada");
        echo("<br>");
        echo("<a href='recetas.php'> Regresar</a>");

    }


?>