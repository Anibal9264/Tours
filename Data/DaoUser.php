<?php
include_once "Model/Conexion.php";

class DaoUser {
    
    public $base;
    
    function __construct() {
    $this->base = Conexion::conectar();
    }
    
    function Login($email, $password){
        $sql = "SELECT * from usuario WHERE email = '$email' and contraseña = '$password'";
        $sentence = $this->base->query($sql);  
        $result = $sentence->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    function Registro($nombre, $apellidos, $identificacion, $fechanac, $email, $password){
        $sql = "INSERT INTO usuario (id, nombre, apellidos, identificacion, email, pais, fecha_nacimiento, contraseña) "
                . "VALUES (null, '$nombre', '$apellidos', '$identificacion', '$email', 'CR', '$fechanac', '$password')";
        $this->base->query($sql);
        return $this->Login($email, $password); 
    }
}

