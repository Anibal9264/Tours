<?php

include 'Data/DaoTours.php';

class Controller_Tour {

    public $dao;

    function __construct() {
        $this->dao = new DaoTours();
    }

    function SearchTour($GET) {
        $search = $GET["search"] ?: null;
        $date1 = $GET["date1"] ?: null;
        $date2 = $GET["date2"] ?: null;
        if (!$search && !$date1 && !$date2) {
            $data = $this->dao->GetTours();
        } else if (!$date1 || !$date2) {
            $data = $this->dao->GetToursOnlySearch($search);
        } else {
            $data = $this->dao->GetToursFind($search, $date1, $date2);
        }
        $tours = array();
        foreach ($data as $id) {
            array_push($tours, $this->getTourDetalles($id->id));
        }
        echo json_encode($tours);
    }

    function GetImgPrincipal($GET) {
        $id = $GET["id"];
        $data = $this->dao->GetImgPrincipal($id);
        echo json_encode($data);
    }

    function GetImgsTour($GET) {
        $id = $GET["id"];
        $data = $this->dao->GetImgsFind($id);
        echo json_encode($data);
    }

    function GetStarsTour($GET) {
        $id = $GET["id"];
        $data = $this->dao->GetStarTour($id);
        echo json_encode($data);
    }

    function GetTour($GET) {
        $id = $GET["id"];
        echo json_encode(getDataTour($id));
    }

    function isFavorite($GET) {
        $tour = $GET["tour"];
        $user = $GET["user"];
        $data = $this->dao->isFavorite($tour, $user);
        echo json_encode($data);
    }

    function getDataTourCompleto($id) {
        $tour = $this->dao->GetTour($id);
        $categoria = $this->dao->getCategoriaTour($tour->Categoria);
        $imgs = $this->dao->GetImgsTour($id);
        $incluye = $this->dao->GetIncluyeTour($id);
        $noIncluye = $this->dao->GetNoIncluyeTour($id);
        $resenias = $this->dao->GetReseñasTour($id);
        $stars = $this->dao->GetStarTour($id);
        $data = array(
            'tour' => $tour,
            'categoria' => $categoria,
            'imgs' => $imgs,
            'incluye' => $incluye,
            'noincluye' => $noIncluye,
            'resenias' => $resenias,
            'stars' => $stars
        );
        return $data;
    }

    function getTourDetalles($id) {
        $tour = $this->dao->GetTour($id);
        $imgs = $this->dao->GetImgsTour($id);
        $resenias = $this->dao->GetReseñasTour($id);
        $stars = $this->dao->GetStarTour($id);
        $data = array(
            "title" => $tour->nombre,
            "puntuacion" => $stars->stars / $stars->cantidad,
            "duracion" => $tour->duracion,
            "precio" => $tour->precio,
            "catOpiniones" => sizeof($resenias),
            "img" => $imgs[0]->img
        );
        return $data;
    }

}
