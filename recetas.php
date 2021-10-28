<?php
    require_once('app/Categoria.php');
    require_once('app/Receta.php');
    require_once('app/CategoriaAgrupada.php');
    $receta = new Receta();
    $categorias =  new Categoria();
    $categoriasLista = $categorias->listar();


    if( isset($_GET['categoria'])){
        $idCategoria = $_GET['categoria'];
        if ( is_numeric( $idCategoria)){
            $receta->setIdCategoria($idCategoria);
            $recetasLista = $receta->listarCategoria();
        }
    } else {
        $recetasLista = $receta->listarTodas();
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Receta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="recetas.php">Receta</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorías
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                                foreach ($categoriasLista as $categoriaItem) {
                                    echo("<li><a class='dropdown-item' href='?categoria=". $categoriaItem['idcategoria'] . "'>". $categoriaItem['grupo'] ."</a></li>");
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">

            <div class="col-md-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Grupo</th>
                            <th>Comentarios</th>
                            <th>Foto</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($recetasLista as $recetaItem) {
                                echo "
                                <tr>
                                    <td>". $recetaItem['nombre']. "</td>
                                    <td>". $recetaItem['grupo']. "</td>
                                    <td>". $recetaItem['comentarios']. "</td>
                                    <td></td>
                                    <td><button class='btn btn-info' type='button' onclick='verReceta(" . $recetaItem['idreceta'] .")' ><i class='fas fa-edit'></i></button>
                                    <a class='btn btn-danger' onclick='eliminarReceta(" . $recetaItem['idreceta'] .")' href='#'><i class='fas fa-trash'></i></a><td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <button onclick="frmClear();" class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalReceta">
                <i class="fas fa-plus"></i> Receta
            </button>
            </div>


        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade scrollable" id="modalReceta" tabindex="-1" aria-labelledby="modalReceta" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReceta">Receta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmReceta" action="crearReceta.php" method="post">
                        <input id="inputId" name="idreceta" type="text" value="0" style="display: none;">
                        <div class="row m-3">
                            <div class="form-floating col-md-12">
                                <input type="text" name="nombre" class="form-control" id="inputNombre" required>
                                <label for="inputNombre">Nombre</label>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col">
                                <div class="row">
                                    <div class="form-floating col-md-12">
                                        <input type="text" name="ingredientes" class="form-control" id="inputIngredientes" required>
                                        <label for="inputIngredientes">ingredientes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="form-floating  col-md-4">
                                        <select name="idCategoria" class="form-select" id="cmbCategoria" aria-label="Categoria" required>
                                            <option value="">Categoria</option>
                                            <?php
                                                foreach($categoriasLista as $item){
                                                    echo("<option value='" . $item['idcategoria'] ."'>" . $item['grupo']."</option>" );
                                                }
                                                ?>
                                        </select>
                                        <label for="cmbCategoria">Categoría</label>
                                    </div>
                                    <div class="form-floating col-md-8">
                                        <select name="idCategoriaAgrupada" class="form-select" id="cmbCategoriaAgrupada" aria-label="CategoriaAgrupada" required>
                                            <option value="">Sub categoría</option>
                                        </select>
                                        <label for="cmbCategoriaAgrupada"> Sub Categoría</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row m-3">
                             
                            <div class="form-floating col-md-7">
                                <textarea name="pasos" class="form-control"  id="textPasos" style="height: 200px" required></textarea>
                                <label for="textPasos">Pasos</label>
                            </div>
                            <div class="col-md-5">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button form="frmReceta" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>