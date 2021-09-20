<?php

/* require_once('modeles/Missions.php');
$missions = new Missions();
$mission = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $missions = $missions->listerMission($_GET['id']);
} */
require_once('modeles/modele.php');
require_once('modeles/mission.php');

$mission = new Mission();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mission = $mission->afficherMission($_GET['id']);
}



require_once('vues/affiche-mission.php');