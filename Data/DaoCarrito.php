<?php
include_once "Model/Conexion.php";

class DaoCarrito {
    
    public $base;
    
    function __construct() {
    $this->base = Conexion::conectar();
    }
    
    function addCarrito($usuario, $tour){
        $sql = "INSERT INTO `opcioncart` (id, Usuario, Tour, cantidad, reservado) VALUES (NULL, '$usuario', '$tour', '1', '0')";
        if ($this->base->query($sql) == true){
            return array("resp" => "1");
        }else{
            return array("resp" => "-1");
        }
    }
    
    function allOpcionCart($usuario){
        $sql = "SELECT * FROM opcioncart WHERE Usuario='$usuario' and reservado='0'";
        $sentence = $this->base->query($sql); 
        $result = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    function allOpcionRes($usuario){
        $sql = "SELECT * FROM opcioncart WHERE Usuario='$usuario' and reservado='1'";
        $sentence = $this->base->query($sql); 
        $result = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    function Limpiar($usuario){
        $sql = "DELETE FROM opcioncart WHERE Usuario ='$usuario'";
        if ($this->base->query($sql) == true){
            return array("resp" => "1");
        }else{
            return array("resp" => "-1");
        }
    }
    
    function Reservar($usuario){
        $sql = "UPDATE opcioncart SET reservado = '1' WHERE Usuario = '$usuario'";
        if ($this->base->query($sql) == true){
            return array("resp" => "1");
        }else{
            return array("resp" => "-1");
        }
    }
}
