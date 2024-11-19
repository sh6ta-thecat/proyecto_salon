<?php
require_once 'conexionDB.php';
class UsuarioModel extends ConexionDB {
    // Variables de Usuario
    public $DniUsuario;
    public $NombreUsuario;
    public $ApellidoUsuario;
    public $Cargo;
    public $Contrasena;
    public $direccion;
    public $telefono;
    // Metodos SQL
    public function consultarUsuario(){
        // Conectandose a la base de datos
        $this->conectarse();
        // creando la consulta SQL
        $sql = "SELECT * FROM usuario";
        // Preparamos la consulta
        $stmt = $this->cnx->prepare($sql);
        // Ejecutamos la consulta
        $stmt->execute();
        // Jalamos los datos de stmt (una vez ya ejecutado)
        $resultado = $stmt->get_result();
        // creando variable para guardar los resultados en un arreglo
        $datos = [];
        // Guardando los registros en la varible datos con un while
        while($fila = $resultado->fetch_assoc()){
            $datos[] = $fila;
        }
        // Cerrando testamento
        $stmt->close();
        // Desconectandose de la base de datos
        $this->desconectarse();
        return $datos;
    }

    public function validarUsuario($DniUsuario,$pswUsuario){
        $this->conectarse();
        $sql = "SELECT * FROM usuario WHERE DNIUsuario = ?";
        $stmt = $this->cnx->prepare($sql);
        $stmt->bind_param("i",$DniUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $datos=[];
        while($fila = $resultado->fetch_assoc()){
            $datos[]=$fila;
        }
        $stmt->close();
        $this->desconectarse();
        if(count($datos) && password_verify($pswUsuario,$datos[0]["contrasena"])){
            return $datos;
        }else{
            return false;
        }
    }   



}
