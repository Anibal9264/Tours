<?php
function GetToursFind($search,$date1,$date2){
include_once "Model/Base_de_datos.php";
$sql = "SELECT * FROM tour;" ;  
$sentence = $base_de_datos->query($sql); 
$resoult = $sentence->fetchAll(PDO::FETCH_OBJ);
return $resoult;
}

