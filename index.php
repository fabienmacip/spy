<?php

require_once('controleurs/Controleur.php');
require_once('modeles/Modele.php');
require_once('modeles/Mission.php');
require_once('modeles/Missions.php');
require_once('modeles/Pays.php');
require_once('modeles/Payss.php');
require_once('modeles/Specialite.php');
require_once('modeles/Specialites.php');
require_once('modeles/TypeMission.php');
require_once('modeles/TypeMissions.php');

$controleur = new Controleur();
// Par défaut, index.php affiche la liste des missions (voir le ELSE)
if (isset($_GET['page']) && 'missions' === $_GET['page']) {
    $controleur->afficherMissions();
} elseif (isset($_GET['page']) && 'payss' === $_GET['page']) {
    $controleur->listerPays();
} elseif (isset($_GET['page']) && 'specialites' === $_GET['page']) {
    $controleur->listerSpecialites();
} elseif (isset($_GET['page']) && 'typemissions' === $_GET['page']) {
    $controleur->listerTypesMissions();
} else {
    $controleur->afficherMissions();
}