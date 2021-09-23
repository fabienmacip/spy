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
require_once('modeles/Administrateur.php');
require_once('modeles/Administrateurs.php');
require_once('modeles/Planque.php');
require_once('modeles/Planques.php');
require_once('modeles/Personne.php');
require_once('modeles/Personnes.php');

$controleur = new Controleur();
// Par défaut, index.php affiche la liste des missions (voir le ELSE)
if (isset($_GET['page']) && 'missions' === $_GET['page']) {
    $controleur->afficherMissions();
// PAYS - CRUD
} elseif (isset($_POST['page']) && 'payss' === $_POST['page'] && isset($_POST['action']) && 'createPays' === $_POST['action'] && isset($_POST['nom'])) {
    $controleur->createPays($_POST['nom']);
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['nom'])) {
    $controleur->deletePays($_GET['id'],$_GET['nom']);
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && !isset($_GET['action'])) {
    $controleur->listerPays();
} elseif (isset($_GET['page']) && 'specialites' === $_GET['page']) {
    $controleur->listerSpecialites();
} elseif (isset($_GET['page']) && 'typemissions' === $_GET['page']) {
    $controleur->listerTypesMissions();
} elseif (isset($_GET['page']) && 'administrateurs' === $_GET['page']) {
    $controleur->listerAdministrateurs();
} elseif (isset($_GET['page']) && 'planques' === $_GET['page']) {
    $controleur->listerPlanques();
} elseif (isset($_GET['page']) && 'personnes' === $_GET['page']) {
    $controleur->listerPersonnes();
//} elseif (isset($_GET['page']) && 'missions' === $_GET['page']) {
//    $controleur->listerMissions();
} else {
    $controleur->afficherMissions();
}