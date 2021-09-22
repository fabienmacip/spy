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
require_once('modeles/planques.php');
require_once('modeles/personne.php');
require_once('modeles/personnes.php');

$mission = new Mission();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mission = $mission->afficherMission($_GET['id']);
}

// Pour le moment, affiche 1 planque dont $_GET['id'] est l'ID d'une mission.
//$planque = new Planque();
//if (isset($_GET['id']) && is_numeric($_GET['id'])) {
//    $planque = $planque->afficherPlanque($_GET['id']);
//}


$planques = new Planques();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $planques = $planques->listerPlanquesDUneMission($_GET['id']);
}


$cibles = new Personnes();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $cibles = $cibles->listerPersonnesDUneMission($_GET['id'], "cible");
}

$contacts = new Personnes();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $contacts = $contacts->listerPersonnesDUneMission($_GET['id'], "contact");
}

$agents = new Personnes();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $agents = $agents->listerPersonnesDUneMission($_GET['id'], "agent");
}

require_once('vues/affiche-mission.php');
?>

<!-- Bouton RETOUR à la liste des MISSIONS -->
<div class="text-center">
        <a href="index.php?page=missions" class="btn btn-primary mt-3">Retour à la liste des missions</a>
</div>