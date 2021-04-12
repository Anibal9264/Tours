<?php
function GetToursFind($search,$date1,$date2){
include_once "Model/Base_de_datos.php";
$sql = "SELECT * FROM tour WHERE id IN (SELECT tour_id FROM tour_datetime WHERE "
        . "date(fecha_hora) BETWEEN '$date1' AND '$date2')"
        . "and nombre like '%$search%' "
        . "and descripcion like '%$search%';" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetToursWeek(){
date_default_timezone_set('America/Costa_Rica');
$today = date("Y-m-j");
include_once "Model/Base_de_datos.php";
$sql = "SELECT * FROM tour WHERE id IN (SELECT tour_id FROM tour_datetime WHERE "
        . "YEARWEEK(fecha_hora) = YEARWEEK('$today'))";  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetToursOnlySearch($search){
include_once "Model/Base_de_datos.php";
$sql = "SELECT * FROM tour WHERE "
        . "nombre like '%$search%' "
        . "and descripcion like '%$search%';" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}


function GetImgsFind($id){
include_once "Model/Base_de_datos.php";
$sql = "SELECT * FROM galeria where Tour = $id;" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetImgP($id){
include_once "Model/Base_de_datos.php";
$sql = "SELECT img FROM galeria where Tour = $id and tipo = 0;" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

function GetStarTour($id){
include_once "Model/Base_de_datos.php";
$sql = "SELECT COUNT(id) as cantidad,SUM(calificacion)as stars FROM resenia WHERE Tour = $id" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}