<?php
    require_once('app/CategoriaAgrupada.php');
    $categoriaAgrupada =  new CategoriaAgrupada();


    if( isset($_GET['categoria'])){
        $idCategoria = $_GET['categoria'];
        if ( is_numeric( $idCategoria)){
            $categoriaAgrupada->setIdCategoria($idCategoria);
            $resultado = $categoriaAgrupada->listarCategorias();
            echo(json_encode($resultado));
        }
    }

?>