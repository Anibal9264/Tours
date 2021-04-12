<?php
include 'Data/DaoTours.php';
switch($_GET["p"]){
 case'SearchTour': SearchTour(); break;
 case'ImgsTour': GetImgsTour(); break;
 case'ImgPTour': GetImgPTour(); break;
 case'StarPTour': GetStarPTour(); break;
}

function SearchTour(){
 $search = $_GET["search"];
 $date1 = $_GET["date1"];
 $date2 = $_GET["date2"];
 if(!$search && !$date1 && !$date2 ){
    $data = GetToursWeek(); 
 }else if(!$date1 || !$date2){
    $data = GetToursOnlySearch($search); 
 }else{
    $data = GetToursFind($search,$date1,$date2); 
 }
 echo json_encode($data);
}


function GetImgPTour(){
 $id = $_GET["id"];
 $data = GetImgP($id);
 echo json_encode($data);
}

function GetImgsTour(){
 $id = $_GET["id"];
 $data = GetImgsFind($id);
 echo json_encode($data);
}

function GetStarPTour(){
 $id = $_GET["id"];
 $data = GetStarTour($id);
 echo json_encode($data);
}
