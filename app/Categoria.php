<?php
    require_once('Conexion.php');

    class Categoria extends ConexionPDO{
        private $idCategoria;
        private $descripcion;
        
        // Implementar luego
        public function crear(){

        }

        public function listar(){
            $this->query = "SELECT C.idcategoria, C.grupo
                            FROM  categorias C";
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