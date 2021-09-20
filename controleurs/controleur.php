<?php

class Controleur {

    public function afficherMissions()
    {
        $missions = new Missions();
        $missions = $missions->listerMissions();
        require_once('vues/liste-missions.php');
    }

    public function afficherPhoto()
    {
        $photo = new Photo();
        $serie = new Serie();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $photo = $photo->afficherPhoto($_GET['id']);
        }
        if (isset($photo) && !is_null($photo->getSerieid())) {
            $serie = $serie->afficherSerie($photo->getSerieid());
        }
        require_once('vues/affiche-photo.php');
    }

    public function afficherMentions()
    {
        require_once('vues/affiche-mentions.php');
    }

    public function listerSeries()
    {
        $series = new Series();
        $series = $series->listerSeries();
        require_once('vues/liste-series.php');
    }
}