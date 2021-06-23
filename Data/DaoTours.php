<?php
include_once "Model/Conexion.php";
class DaoTours {
    
public $base;
function __construct() {
    $this->base = Conexion::conectar();
}
    
function GetTours(){
$sql = "SELECT id FROM tour";  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetToursOnlySearch($search){
$sql = "SELECT id FROM tour WHERE "
        . "nombre like '%$search%' "
        . "and descripcion like '%$search%';" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetToursFind($search,$date1,$date2){
$sql = "SELECT id FROM tour WHERE id IN (SELECT tour_id FROM tour_datetime WHERE "
        . "date(fecha_hora) BETWEEN '$date1' AND '$date2')"
        . "and nombre like '%$search%' "
        . "and descripcion like '%$search%';" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
} 


function GetImgsTour($id){
$sql = "SELECT * FROM galeria where Tour = $id;" ;  
$sentence = $this->base->query($sql);  
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetImgPrincipal($id){
$sql = "SELECT img FROM galeria where Tour = $id and tipo = 0;" ;  
$sentence = $this->base->query($sql);  
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

function GetStarTour($id){
$sql = "SELECT COUNT(id) as cantidad,SUM(calificacion)as stars FROM resenia WHERE Tour = $id" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

function GetTour($id){
$sql = "SELECT * from tour WHERE id = $id" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

function getCategoriaTour($id){
$sql = "SELECT * from categoria WHERE id = $id" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

function GetIncluyeTour($id){
$sql = "SELECT * from opcion WHERE id in (SELECT Opcion_id FROM incluye WHERE tour_id = $id);" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetNoIncluyeTour($id){
$sql = "SELECT * from opcion WHERE id in (SELECT Opcion_id FROM no_incluye WHERE tour_id = $id);" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function GetReseñasTour($id){
$sql = "SELECT * from resenia WHERE Tour = $id" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

function isFavorite($tour,$user){
$sql = "SELECT * from TourFavorito WHERE Tour_id = '$tour' and Usuario_id = '$user'" ;  
$sentence = $this->base->query($sql); 
$resoult = $sentence->fetch(PDO::FETCH_OBJ);
return $resoult;
}

}