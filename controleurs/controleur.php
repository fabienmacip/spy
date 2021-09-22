<?php

class Controleur {

    public function afficherMissions()
    {
        $missions = new Missions();
        $missions = $missions->listerMissions();
        require_once('vues/liste-missions.php');
    }

    public function listerPays()
    {
        $payss = new Payss();
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function listerSpecialites()
    {
        $specialites = new Specialites();
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function listerTypesMissions()
    {
        $typeMissions = new TypeMissions();
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }


    // METHODES EXEMPLES

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