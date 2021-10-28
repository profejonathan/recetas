<?php
    require_once('app/Receta.php');


    // Recibe los datos por POST, valida campos e insertar en la Db
    if ( isset($_POST['nombre']) && isset( $_POST['idCategoria']) && isset( $_POST['idCategoriaAgrupada'])
            && isset($_POST['ingredientes']) && isset($_POST['pasos']) && isset($_POST['idreceta'])  ){
                        // Cuando se desarrolle el login
        $idUsuario = 1;  // Modificar para que tomo el id del usuario logueado
        $idreceta = $_POST['idreceta'];

        $nombre = $_POST['nombre'];
        $idCategoria = $_POST['idCategoria'];
        $idCategoriaAgrupada = $_POST['idCategoriaAgrupada'];

        $ingredientes = $_POST['ingredientes'];
        $pasos = $_POST['pasos'];

        $receta = new Receta();
        $receta->setIdReceta($idreceta);
        $receta->setIdUsuario($idUsuario);
        $receta->setCategoriaAgrupadas($idCategoriaAgrupada);
        $receta->setNombre($nombre);
        $receta->setIngredientes($ingredientes);
        $receta->setPasos($pasos);

        if ( $idreceta == '0'){
            $receta->crear();

        }else {
            $receta->actualizar();
        }

        echo("Receta Guardada");
        echo("<br>");
        echo("<a href='recetas.php'> Regresar</a>");

    }


?>