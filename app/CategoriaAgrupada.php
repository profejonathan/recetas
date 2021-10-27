<?php
    require_once('Conexion.php');

    class CategoriaAgrupada extends ConexionPDO{
        private $titulo;
        private $id;
        private $idcategoria;

        public function setId($id){
            $this->id = $id;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function setIdCategoria($idcategoria){
            $this->idcategoria = $idcategoria;
        }

        // CREATE
        public function crear(){
            $this->query= "INSERT INTO categoriaAgrupadas (titulo, idcategoria)
                            VALUES( :titulo, :idcategoria)";

            $this->ejecutar( array(
                    ':titulo' => $this->titulo,
                    ':idcategoria' => $this->idcategoria
            ));
        }

        public function listarTodas(){
            $this->query = "SELECT CA.idcategoriaAgrupadas, CA.titulo 
                            FROM categoriaAgrupadas CA";
            $consulta = $this->getRegistros();
            return $consulta;
        }

        public function listarCategorias(){
            $this->query = "SELECT CA.idcategoriaAgrupadas, CA.titulo 
                            FROM categoriaAgrupadas CA
                            WHERE CA.idcategoria = :idcategoria";
            $consulta = $this->getRegistros(array(
                'idcategoria' => $this->idcategoria
            ));
            return $consulta;
        }

        // UPDATE
        public function editar(){
            $this->query = "UPDATE categoriaAgrupadas
                            SET titulo = :titulo
                            WHERE idcategoriaAgrupadas = :id";

            $this->ejecutar( array(
                ':titulo' => $this->titulo,
                ':id' =>$this->id
            ));
        }
        
        // DELETE
        public function borrar(){
            $this->query = "DELETE FROM categoriaAgrupadas
                            WHERE idcategoriaAgrupadas = :id";
            $this->ejecutar( array( 
                'id' => $this->id
            ));
        }


    }


?>