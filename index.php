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

/* $LISTE_PAYS = "index.php?page=payss";
$LISTE_SPECIALITES = "index.php?page=specialites";
$LISTE_TYPE_MISSIONS = "index.php?page=typemissions";
$LISTE_PLANQUES = "index.php?page=planques";
$LISTE_PERSONNES = "index.php?page=personnes";
$LISTE_MISSIONS = "index.php?page=missions";
$LISTE_ADMINISTRATEURS = "index.php?page=administrateurs"; */

$controleur = new Controleur();
// Par défaut, index.php affiche la liste des missions (voir le ELSE)
if (isset($_GET['page']) && 'missions' === $_GET['page']) {
    $controleur->afficherMissions();
// PAYS - CRUD
// PAYS - CREATE
} elseif (isset($_POST['page']) && 'payss' === $_POST['page'] && isset($_POST['action']) && 'createPays' === $_POST['action'] && isset($_POST['nom'])) {
    $controleur->createPays($_POST['nom']);
// PAYS - UPDATE
} elseif (isset($_POST['page']) && 'payss' === $_POST['page'] && isset($_POST['action']) && 'updatePays' === $_POST['action'] && isset($_POST['nom'])) {
    $controleur->updatePays($_POST['idPaysToUpdate'],$_POST['nom']);
// PAYS - DELETE
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['nom'])) {
    $controleur->deletePays($_GET['id'],$_GET['nom']);
// PAYS - READ
} elseif (isset($_GET['page']) && 'payss' === $_GET['page'] && !isset($_GET['action'])) {
    $controleur->listerPays();

// SPECIALITE - CRUD
// SPECIALITE - CREATE
} elseif (isset($_POST['page']) && 'specialites' === $_POST['page'] && isset($_POST['action']) && 'createSpecialite' === $_POST['action'] && isset($_POST['intitule'])) {
    $controleur->createSpecialite($_POST['intitule']);
// SPECIALITE - UPDATE
} elseif (isset($_POST['page']) && 'specialites' === $_POST['page'] && isset($_POST['action']) && 'updateSpecialite' === $_POST['action'] && isset($_POST['intitule'])) {
    $controleur->updateSpecialite($_POST['idSpecialiteToUpdate'],$_POST['intitule']);
// SPECIALITE - DELETE
} elseif (isset($_GET['page']) && 'specialites' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['intitule'])) {
    $controleur->deleteSpecialite($_GET['id'],$_GET['intitule']);
// SPECIALITE - READ
} elseif (isset($_GET['page']) && 'specialites' === $_GET['page']) {
    $controleur->listerSpecialites();

// TYPES de MISSIONS - CRUD
// TYPES de MISSIONS - CREATE
} elseif (isset($_POST['page']) && 'typemissions' === $_POST['page'] && isset($_POST['action']) && 'create' === $_POST['action'] && isset($_POST['intitule'])) {
    $controleur->createTypeMission($_POST['intitule']);
// TYPES de MISSIONS - UPDATE
} elseif (isset($_POST['page']) && 'typemissions' === $_POST['page'] && isset($_POST['action']) && 'update' === $_POST['action'] && isset($_POST['intitule'])) {
    $controleur->updateTypeMission($_POST['idTypeMissionToUpdate'],$_POST['intitule']);
// TYPES de MISSIONS - DELETE
} elseif (isset($_GET['page']) && 'typemissions' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['intitule'])) {
    $controleur->deleteTypeMission($_GET['id'],$_GET['intitule']);
// TYPES de MISSIONS - READ
} elseif (isset($_GET['page']) && 'typemissions' === $_GET['page']) {
    $controleur->listerTypesMissions();

// ADMINISTRATEURS - CRUD    
// ADMINISTRATEURS - CREATE
} elseif (isset($_POST['page']) && 'administrateurs' === $_POST['page'] && isset($_POST['action']) && 'create' === $_POST['action'] 
            && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['mot_de_passe'])) {
    $controleur->createAdministrateur($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mot_de_passe']);
// ADMINISTRATEURS - UPDATE
} elseif (isset($_POST['page']) && 'administrateurs' === $_POST['page'] && isset($_POST['action']) && 'update' === $_POST['action'] && isset($_POST['nom']) && isset($_POST['prenom'])) {
    $controleur->updateAdministrateur($_POST['idAdministrateurToUpdate'],$_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mot_de_passe']);
// ADMINISTRATEURS - DELETE
} elseif (isset($_GET['page']) && 'administrateurs' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prenom'])) {
    $controleur->deleteAdministrateur($_GET['id'],$_GET['nom'],$_GET['prenom']);
// ADMINISTRATEURS - READ
} elseif (isset($_GET['page']) && 'administrateurs' === $_GET['page']) {
    $controleur->listerAdministrateurs();

// PLANQUES - CRUD
// PLANQUES - CREATE
} elseif (isset($_POST['page']) && 'planques' === $_POST['page'] && isset($_POST['action']) && 'create' === $_POST['action'] 
&& isset($_POST['code']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['pays'])) {
$controleur->createPlanque($_POST['code'],$_POST['adresse'],$_POST['ville'],$_POST['pays']);
// PLANQUES - UPDATE
} elseif (isset($_POST['page']) && 'planques' === $_POST['page'] && isset($_POST['action']) && 'update' === $_POST['action'] 
          && isset($_POST['code']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['pays'])) {
$controleur->updatePlanque($_POST['idPlanqueToUpdate'],$_POST['code'],$_POST['adresse'],$_POST['ville'],$_POST['pays']);
// PLANQUES - DELETE
} elseif (isset($_GET['page']) && 'planques' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] && isset($_GET['id']) && isset($_GET['code']) && isset($_GET['ville'])) {
$controleur->deletePlanque($_GET['id'],$_GET['code'],$_GET['ville']);
// PLANQUES - READ
} elseif (isset($_GET['page']) && 'planques' === $_GET['page']) {
    $controleur->listerPlanques();

// PERSONNES - CRUD
// PERSONNES - CREATE
} elseif (isset($_POST['page']) && 'personnes' === $_POST['page'] && isset($_POST['action']) && 'create' === $_POST['action'] 
&& isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dob']) && isset($_POST['secret_code']) && isset($_POST['pays']) && isset($_POST['type'])) {
    if(isset($_POST['specialite'])) {
        $controleur->createPersonne($_POST['nom'], $_POST['prenom'], $_POST['dob'], $_POST['secret_code'], $_POST['pays'], $_POST['type'], $_POST['specialite']);
    }
    else {
        $controleur->createPersonne($_POST['nom'], $_POST['prenom'], $_POST['dob'], $_POST['secret_code'], $_POST['pays'], $_POST['type']);
    }
// PERSONNES - UPDATE
} elseif (isset($_POST['page']) && 'personnes' === $_POST['page'] && isset($_POST['action']) && 'update' === $_POST['action'] && isset($_POST['idPersonneToUpdate'])
&& isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dob']) && isset($_POST['secret_code']) && isset($_POST['pays']) && isset($_POST['type'])) {
    if(isset($_POST['specialite'])) {
        $controleur->updatePersonne($_POST['idPersonneToUpdate'],$_POST['nom'], $_POST['prenom'], $_POST['dob'], $_POST['secret_code'], $_POST['pays'], $_POST['type'], $_POST['specialite']);
    }
    else {
        $controleur->updatePersonne($_POST['idPersonneToUpdate'],$_POST['nom'], $_POST['prenom'], $_POST['dob'], $_POST['secret_code'], $_POST['pays'], $_POST['type']);
    }    
// PERSONNES - DELETE
} elseif (isset($_GET['page']) && 'personnes' === $_GET['page'] && isset($_GET['action']) && 'delete' === $_GET['action'] 
&& isset($_GET['id']) && isset($_GET['nom']) && isset($_GET['prenom'])) {
$controleur->deletePersonne($_GET['id'],$_GET['nom'],$_GET['prenom']);
// PERSONNES - READ
} elseif (isset($_GET['page']) && 'personnes' === $_GET['page']) {
    $controleur->listerPersonnes();
    
   
// MISSIONS - CRUD
//} elseif (isset($_GET['page']) && 'missions' === $_GET['page']) {
//    $controleur->listerMissions();
} else {
    $controleur->afficherMissions();
}