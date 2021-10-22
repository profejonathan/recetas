<?php
    require_once('Conexion.php');

    class CategoriaAgrupada extends ConexionPDO{
        private $titulo;
        private $id;
        

        public function setId($id){
            $this->id = $id;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        // CREATE
        public function crear(){
            $this->query= "INSERT INTO categoriaagrupadas (titulo)
                            VALUES( :titulo)";

            $this->ejecutar( array(
                    ':titulo' => $this->titulo
            ));
        }

        public function listar(){
            $this->query = "SELECT C.idcategoriaAgrupadas, C.titulo 
                            FROM categoriaagrupadas C";
            $consulta = $this->getRegistros();
            return $consulta;
        }

        // UPDATE
        public function editar(){
            $this->query = "UPDATE categoriaagrupadas
                            SET titulo = :titulo
                            WHERE idcategoriaAgrupadas = :id";

            $this->ejecutar( array(
                ':titulo' => $this->titulo,
                ':id' =>$this->id
            ));
        }
        
        // DELETE
        public function borrar(){
            $this->query = "DELETE FROM categoriaagrupadas
                            WHERE idcategoriaAgrupadas = :id";
            $this->ejecutar( array( 
                'id' => $this->id
            ));
        }


    }


?>