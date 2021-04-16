<?php
include_once "Model/Conexion.php";

class DaoCarrito {
    
    public $base;
    
    function __construct() {
    $this->base = Conexion::conectar();
    }
    
    function addCarrito($usuario, $tour){
        $sql = "INSERT INTO `opcioncart` (id, Usuario, Tour, cantidad) VALUES (NULL, '$usuario', '$tour', '1')";
        if ($this->base->query($sql) == true){
            return array("resp" => "1");
        }else{
            return array("resp" => "-1");
        }
    }
    
    function allOpcionCart($usuario){
        $sql = "SELECT * FROM opcioncart WHERE Usuario='$usuario'";
        $sentence = $this->base->query($sql); 
        $result = $sentence->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
