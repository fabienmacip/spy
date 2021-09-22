<?php

/* require_once('modeles/Missions.php');
$missions = new Missions();
$mission = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $missions = $missions->listerMission($_GET['id']);
} */
require_once('modeles/modele.php');
require_once('modeles/mission.php');
require_once('modeles/planque.php');
require_once('modeles/cible.php');

$mission = new Mission();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mission = $mission->afficherMission($_GET['id']);
}

// Pour le moment, affiche 1 planque dont $_GET['id'] est l'ID d'une mission.
$planque = new Planque();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $planque = $planque->afficherPlanque($_GET['id']);
}

// Pour le moment, affiche 1 personne (cible) dont $_GET['id'] est l'ID d'une mission.
$cible = new Cible();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $cible = $cible->afficherCible($_GET['id']);
}



require_once('vues/affiche-mission.php');