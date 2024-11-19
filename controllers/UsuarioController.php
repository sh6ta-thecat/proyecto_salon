<?php 
    require_once __DIR__ . '/../models/UsuarioModel.php';
    class UsuarioController{
        private $modeloUsuario;
        function __construct() {
            $this->modeloUsuario = new UsuarioModel();
        }
        public function ValidacionUsuario($DniUsuario,$psw){
            $dato = $this->modeloUsuario->validarUsuario($DniUsuario,$psw);
            return $dato;
        }
    }