<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include_once 'Controller/Controller_Tour.php';
include_once 'Controller/ControllerUser.php';
$Tour = new Controller_Tour();
$User = new ControllerUser();
if (!isset($_REQUEST["p"])) {
    echo "No encontrado";
} else {
    if (isset($_GET["p"])) {
        switch ($_GET["p"]) {
            //aqui se le dice que archivo ejecutar segun la peticion en el request
            case'SearchTour':$Tour->SearchTour($_GET);
                break;
            case'ImgsTour':$Tour->GetImgsTour($_GET);
                break;
            case'ImgPTour':$Tour->GetImgPrincipal($_GET);
                break;
            case'StarsTour':$Tour->SearchTour($_GET);
                break;
            case'GetTour':$Tour->GetTour($_GET);
                break;
            case'Login':$User->Login($_GET);
                break;
            case'GetUser':$User->GetUser($_GET);
                break;
            case'isFavorite':$Tour->isFavorite($_GET);
                break;
        }
    }
    
    if (isset($_POST["p"])) {
        switch ($_POST["p"]) {
            case'Registro':$User->Registro($_POST);
                break;
        }
    }
}


