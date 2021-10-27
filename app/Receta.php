<?php
    require_once('Conexion.php');

    class Receta extends ConexionPDO{
        private $idReceta;
        private $idUsuario;
        private $idCategoria;
        private $nombre;
        private $ingredientes;
        private $pasos;
        

        public function setIdReceta($idReceta){
            if ( is_numeric( $idReceta) ) {
                $this->idReceta = $idReceta;

            } else {
                return 'Dato invalido';
            }
        }

        public function setIdUsuario($idUsuario){
            if ( is_numeric( $idUsuario) ) {
                $this->idUsuario = $idUsuario;

            } else {
                return 'Dato invalido';
            }
        }


        public function setIdCategoria($idCategoria){
            if ( is_numeric( $idCategoria) ) {
                $this->idCategoria = $idCategoria;

            } else {
                return 'Dato invalido';
            }
        }

        public function setNombre($nombre){
            if ( strlen($nombre) <= 30){
                $this->nombre = $nombre;
            } else {
                return "Logitud de caracteres exedida";
            }
        }

        public function setIngredientes($ingredientes){
            if ( strlen($ingredientes) <= 500){
                $this->ingredientes = $ingredientes;
            } else {
                return "Logitud de caracteres exedida";
            }
        }

        public function setPasos($pasos){
            if ( strlen($pasos) <= 5000){
                $this->pasos = $pasos;
            } else {
                return "Logitud de caracteres exedida";
            }
        }

        // Realiza el insert en al DB
        public function crear(){
            $this->query= "INSERT INTO recetas (idusuario, idpais, idcategoria, nombre, ingredientes, pasos)
                            VALUES( :idusuario, :idpais, :idcategoria, :nombre, :ingredientes, :pasos)";

            $this->ejecutar( array(
                    ':idusuario' => $this->idUsuario, 
                    ':idpais' => $this->idPais,
                    ':idcategoria' => $this->idCategoria,
                    ':nombre' => $this->nombre,
                    ':ingredientes' => $this->ingredientes,
                    ':pasos' => $this->pasos
            ));

        }

        // Realiza SELECT de todas las recetas con datos basicos
        public function listarTodas(){
            $this->query = "SELECT R.idreceta, R.nombre, R.idcategoriaAgrupadas, CA.titulo AS 'grupo', 
                                COUNT(RC.idcomentario) AS 'comentarios'
                            FROM recetas R
                            INNER JOIN categoriaAgrupadas CA ON CA.idcategoriaAgrupadas = R.idcategoriaAgrupadas
                            LEFT JOIN recetaComentarios RC ON RC.idreceta = R.idreceta 
                            GROUP BY R.idreceta, CA.idcategoriaAgrupadas, RC.idcomentario ";
            return $this->getRegistros();
        }


        // Realiza SELECT de las recetas con datos basicos por categoria
        public function listarCategoria(){
            $this->query = "SELECT R.idreceta, R.nombre, R.idcategoriaAgrupadas, CA.titulo AS 'grupo', 
                                COUNT(RC.idcomentario) AS 'comentarios'
                            FROM recetas R
                            INNER JOIN categoriaAgrupadas CA ON CA.idcategoriaAgrupadas = R.idcategoriaAgrupadas
                            LEFT JOIN recetaComentarios RC ON RC.idreceta = R.idreceta 
                            WHERE CA.idcategoria = :categoriaId
                            GROUP BY R.idreceta, CA.idcategoriaAgrupadas, RC.idcomentario ";
            return $this->getRegistros(array(
                'categoriaId' => $this->idCategoria
            ));
        }

        // Realiza SELECT con todos los datos de la receta por idreceta
        public function detalle(){
            $this->query = "SELECT R.idreceta, R.nombre, R.idcategoria, R.pasos 
                            FROM recetas R
                            WHERE R.idreceta = :idreceta ";
            return $this->getRegistros(array(
                'idreceta' =>  $this->idReceta
            ));
            
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
        public function borrar(){
            $this->query = "DELETE FROM recetas
                            WHERE idreceta = :idreceta";
            $this->ejecutar( array( 
                'idreceta' => $this->idReceta
            ));

        }


    }

?>