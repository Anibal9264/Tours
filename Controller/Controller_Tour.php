<?php
include 'Data/DaoTours.php';



class Controller_Tour{
public $dao;
function __construct() {
    $this->dao = new DaoTours();
}
   
function SearchTour($GET){
 $search = $GET["search"];
 $date1 = $GET["date1"];
 $date2 = $GET["date2"];
 if(!$search && !$date1 && !$date2 ){
  $data = $this->dao->GetToursWeek();
 }else if(!$date1 || !$date2){
    $data = $this->dao->GetToursOnlySearch($search); 
 }else{
    $data = $this->dao->GetToursFind($search,$date1,$date2); 
 }
 echo json_encode($data);
}


function GetImgPrincipal($GET){
 $id = $GET["id"];
 $data = $this->dao->GetImgPrincipal($id);
 echo json_encode($data);
}

function GetImgsTour($GET){
 $id = $GET["id"];
 $data = $this->dao->GetImgsFind($id);
 echo json_encode($data);
}

function GetStarsTour($GET){
 $id = $GET["id"];
 $data = $this->dao->GetStarTour($id);
 echo json_encode($data);
}

function GetTour($GET){
 $id = $GET["id"];
 $tour = $this->dao->GetTour($id);
 $categoria = $this->dao->getCategoriaTour($tour->Categoria);
 $imgs = $this->dao->GetImgsTour($id);
 $incluye = $this->dao->GetIncluyeTour($id);
 $noIncluye = $this->dao->GetNoIncluyeTour($id);
 $reseñas = $this->dao->GetReseñasTour($id);
 $stars = $this->dao->GetStarTour($id);
 $data = array(
     'tour' => $tour,
     'categoria' => $categoria,
     'imgs' => $imgs,
     'incluye' => $incluye,
     'noincluye' => $noIncluye,
     'reseñas' => $reseñas,
     'stars' => $stars
 );
 echo json_encode($data);
}

}
