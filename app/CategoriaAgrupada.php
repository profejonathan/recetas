<?php
    require_once('Conexion.php');

    class CategoriaAgrupada extends ConexionPDO{
        private $titulo;
        private $id;
        
        // Implementar luego
        public function crear(){

        }

        public function listar(){
            $this->query = "SELECT C.idcategoriaAgrupadas, C.titulo 
                            FROM categoriaagrupadas C";
            $consulta = $this->getRegistros();
            return $consulta;
        }

        // Implementar luego
        public function editar(){

        }
        
        // Implementar luego
        public function borra(){

        }


    }


?>