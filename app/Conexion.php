<?php
    define('HOST', 'localhost');
    define('DB_NAME', 'recetas');
    define('USER_DB', 'root');
    define('USER_PASS', '');

    // Conexion a la base con el conecto PDO
    class ConexionPDO {
        private $server = HOST;
        private $dbname =  DB_NAME;
        private $username = USER_DB;
        private $password = USER_PASS;
        private $objPDO;
        public $query = "";

        function __construct(){
            $this->conectar();
        }


        // Conectar a la DB 
        private function conectar(){
            try {
                $this->objPDO =  new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->username, 
                                $this->password, array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' )); // Codificación e caracteres utf-8
                $this->objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch( PDOExecption $e){
                echo( $e->getMessage());
            }
        }


        // Deconectar la DB
        public function desconectar(){
            $this->objPDO = null;
        }

        // SELECT
        public function getRegistros($paramentros=array()){ // Los parametros son array ASOCIATIVO
            try {

                if ( count($paramentros) > 0 ){
                    $consulta = $this->objPDO->prepare($this->query);
                    $consulta->execute($paramentros);
                    return $consulta->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $consulta = $this->objPDO->prepare($this->query);
                    $consulta->execute();
                    return $consulta->fetchAll(PDO::FETCH_ASSOC);
                }

            } catch( PDOExecption $e){
                echo( $e->getMessage());
            }

        }

        // INSERT, UPDATE, DELETE
        public function ejecutar($paramentros=array()){
            try {

                if ( count($paramentros) > 0 ){
                    $consulta = $this->objPDO->prepare($this->query);
                    $consulta->execute($paramentros);
                    
                } else {
                    $consulta = $this->objPDO->prepare($this->query);
                    $consulta->execute();
                    
                }

            } catch( PDOExecption $e){
                echo( $e->getMessage());
            }
        }



    }




?>