<?php
include_once 'Data/DaoUser.php';
include_once 'Data/DaoCarrito.php';

class ControllerCarrito {
    
    public $daous;
    public $daocar;
    
    function __construct() {
    $this->daous = new DaoUser();
    $this->daocar = new DaoCarrito();
    }
    
    function addCarrito($POST){
        $usuario = $POST["user"];
        $tour = $POST["tour"];
        $data = $this->daocar->addCarrito($usuario, $tour);
        echo json_encode($data);
    }
    
    function allOpctionCart($GET){
        $usuario = $GET["user"];
        $data = $this->daocar->allOpcionCart($usuario);
        echo json_encode($data);
    }
    
    function allOpctionRes($GET){
        $usuario = $GET["user"];
        $data = $this->daocar->allOpcionRes($usuario);
        echo json_encode($data);
    }
    
    function limpiar($POST){
        $user = $POST["user"];
        $data = $this->daocar->limpiar($user);
        echo json_encode($data);
    }
    
    function reservar($POST){
        $user = $POST["user"];
        $data = $this->daocar->Reservar($user);
        echo json_encode($data);
    }
}
