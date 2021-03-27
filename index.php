<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
       if(!isset($_REQUEST["p"])){
           echo "error";
       }else{
        switch($_GET["p"]){
            //aqui se le dice que archivo ejecutar segun la peticion en el request
            case'holaRoss':include_once 'Controller/holis.php';break;
        }
       
 }