<?php
include 'Data/DaoTours.php';
switch($_GET["p"]){
 case'SearchTour': SearchTour(); break;
}

function SearchTour(){
 $search = $_GET["search"];
 $date1 = $_GET["date1"];
 $date2 = $_GET["date2"];
 $data = GetToursFind($search,$date1,$date2);
 echo json_encode($data);
}


