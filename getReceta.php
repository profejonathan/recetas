<?php
    require_once('app/Receta.php');

    if( isset($_GET['idreceta'])){
        $idreceta = $_GET['idreceta'];
        if ( is_numeric( $idreceta)){
            $receta = new Receta();
            $receta->setIdReceta($idreceta);
            $resultado = $receta->detalle();
            echo(json_encode($resultado));
        }
    }

?>