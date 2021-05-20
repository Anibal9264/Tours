<?php
include 'Data/DaoUser.php';

class ControllerUser{
    public $dao;
    
    function __construct() {
    $this->dao = new DaoUser();
    }

    function Login($GET){
        $email = $GET["email"];
        $password = $GET["password"];
        $data = $this->dao->Login($email, $password);
        echo json_encode($data);
    }
    
    function Registro($GET){
        $nombre = $GET["nombre"];
        $apellidos = $GET["apellidos"];
        $id = $GET["id"];
        $fechanac = $GET["fechanac"];
        $email = $GET["email"];
        $password = $GET["password"];
        $data = $this->dao->Registro($nombre, $apellidos, $id, $fechanac, $email, $password);
        echo json_encode($data);
    }
    
    function GetUser($GET){
        $id = $GET["id"];
        $data = $this->dao->GetUser($id);
        echo json_encode($data);
    }
}

