<?php
    require_once('Conexion.php');

    class Receta extends ConexionPDO{
        private $idReceta;
        private $idUsuario;
        private $idPais;
        private $nombre;
        private $ingredientes;
        private $pasos;
        

        public function setIdReceta($idReceta){
            if ( is_numeric( $id) ) {
                $this->idRecete = $idReceta;

            } else {
                return 'Dato invalido';
            }
        }


        public function setNombre($nombre){
            if ( count_chars($nombre) <= 30){
                $this->nombre = $nombre;
            } else {
                return "Logitud de caracteres exedida";
            }

        }

        // Realiza el insert en al DB
        public function crear(){
            $this->query= "INSERT INTO recetas (idusuario, idpais, nombre, ingredientes, pasos)
                            VALUES( :idusuario, :idpais, :nombre, :ingredientes, :pasos)";

            $this->ejecutar( array(
                    ':idusuario' => $this->idUsuario, 
                    ':idpais' => $this->idPais, 
                    ':nombre' => $this->nombre,
                    ':ingredientes' => $this->ingredientes,
                    ':pasos' => $this->pasos
            ));

        }

        public function listar(){
            $this->query = "SELECT C.idcategoria, c.descripcion, CA.titulo AS 'CategoriaAgrupada'
                            FROM  categorias C
                            INNER JOIN categoriaagrupadas CA ON CA.idcategoriaAgrupadas = C.idcategoriaAgrupadas ";
            return $this->getRegistros();
            
        }

        // Implementar luego
        public function editar(){
            $this->query = "UPDATE recetas
                            SET idpais = :idpais,
                                nombre = :nombre,
                                ingredientes = :ingredientes,
                                pasos = :pasos
                            WHERE idreceta  = :idreceta";
            $this->ejecutar( array(
                ':idpais' => $this->idPais,
                ':nombre' => $this->nombre,
                ':ingredientes' => $this->ingredientes,
                ':pasos' => $this->pasos,
                ':idreceta' => $this->idReceta
            ));

        }

        // DELETE en la DB
        public function borra(){
            $this->query = "DELETE FROM recetas
                            WHERE idreceta = :idreceta";
            $this->ejecutar( array( 
                'idreceta' => $this->idReceta
            ))
        }


    }

    $re1 =  new Categoria();

    $re1->setIdReceta(2);

    $datos = $re1->listar();
    echo( json_encode( $datos) );
?>