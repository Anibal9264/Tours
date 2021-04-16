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
    
    function Registro($POST){
        $nombre = $POST["nombre"];
        $apellidos = $POST["apellidos"];
        $id = $POST["id"];
        $fechanac = $POST["fechanac"];
        $email = $POST["email"];
        $password = $POST["password"];
        $data = $this->dao->Registro($nombre, $apellidos, $id, $fechanac, $email, $password);
        echo json_encode($data);
    }
    
    function GetUser($GET){
        $id = $GET["id"];
        $data = $this->dao->GetUser($id);
        echo json_encode($data);
    }
}

