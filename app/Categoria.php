<?php
    require_once('Conexion.php');

    class Categoria extends ConexionPDO{
        private $idCategoria;
        private $descripcion;
        
        // Implementar luego
        public function crear(){

        }

        public function listar(){
            $this->query = "SELECT C.idcategoria, c.descripcion, CA.titulo AS 'CategoriaAgrupada'
                            FROM  categorias C
                            INNER JOIN categoriaagrupadas CA ON CA.idcategoriaAgrupadas = C.idcategoriaAgrupadas ";
            return $this->getRegistros();
            
        }

        // Implementar luego
        public function editar(){

        }

        // Implementar luego
        public function borra(){

        }


    }

?>