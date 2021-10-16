<?php
    require_once('app/Receta.php');
    $receta = new Receta();



    $idreceta = $_GET['idreceta'];
    echo('Eliminando receta ' . $idreceta);



    $receta->setIdReceta($idreceta);
    $receta->borrar();



    echo("<br>");
    echo("<a href='recetas.php'> Regresar</a>");

?>