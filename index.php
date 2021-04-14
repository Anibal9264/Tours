<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include_once 'Controller/Controller_Tour.php';
$Tour = new Controller_Tour();
       if(!isset($_REQUEST["p"])){
           echo "No encontrado";
       }else{
        switch($_GET["p"]){
            //aqui se le dice que archivo ejecutar segun la peticion en el request
            case'SearchTour':$Tour->SearchTour($_GET);break;
            case'ImgsTour':$Tour->GetImgsTour($_GET);break;
            case'ImgPTour':$Tour->GetImgPrincipal($_GET);break;
            case'StarsTour':$Tour->GetStarsTour($_GET);break;
            case'GetTour':$Tour->GetTour($_GET);break;
        } 
 }
 