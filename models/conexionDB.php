<?php 
    require_once 'config.php';
    class ConexionDB{
        public $cnx;
        public function __construct() {
        }
        // Metodo para conectarse a la base de datos inventarioSalon
        public function conectarse(){
            $this->cnx = new mysqli(SERVER,USER,PSW,DB);
            if($this->cnx->connect_error){
                die("Error en la conexion de la base de datos" . $this->cnx->connect_error);
            }
        }
        // Metodo para desconectarse de la base de datos
        public function desconectarse(){
            $this->cnx->close();
        }

    }