<?php
    require_once('app/Categoria.php');

    $categoiras =  new Categoria();
    $categoriasLista = $categoiras->listar();
    

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Recetas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
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
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>ingredientes</th>
                            <th>Categoria</th>
                            <th>Creador</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Crear Receta</button>
            </div>


        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalReceta" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReceta">Receta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmReceta" action="crearReceta.php" method="post">
                        <div class="row">
                            <div class="form-floating m-3 col-md-11">
                                <input type="text" name="nombre" class="form-control" id="inputNombre" >
                                <label for="inputNombre">Nombre</label>
                              </div>


                              <div class="form-floating m-3 col-md-11">
                                <select name="idCategoria" class="form-select" id="cmbCategoria" aria-label="Categoria">
                                  <option value="0">Seleccione una categoria</option>
                                    <?php
                                        foreach($categoriasLista as $item){
                                            echo($item['descripcion']);
                                            echo("<option value='" . $item['idcategoria'] ."'>" . $item['descripcion']."</option>" );

                                        }


                                    ?>
                                </select>
                                <label for="cmbCategoria">Categoría</label>
                              </div>

                              <div class="form-floating m-3 col-md-11">
                                <input type="text" name="ingredientes" class="form-control" id="inputIngredientes" >
                                <label for="inputIngredientes">ingredientes</label>
                              </div>
                              <div class="form-floating m-3 col-md-11">
                                <textarea name="pasos" class="form-control"  id="textPasos" style="height: 200px"></textarea>
                                <label for="textPasos">Pasos</label>
                              </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button form="frmReceta" type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>