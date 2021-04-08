<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
       if(!isset($_REQUEST["p"])){
           echo "error";
       }else{
        switch($_GET["p"]){
            //aqui se le dice que archivo ejecutar segun la peticion en el request
            case'SearchTour':include_once 'Controller/Controller_Tour.php';break;
            case'ImgsTour':include_once 'Controller/Controller_Tour.php';break;
            case'ImgPTour':include_once 'Controller/Controller_Tour.php';break;
            case'StarPTour':include_once 'Controller/Controller_Tour.php';break;
        } 
 }
 