<?php
session_start();

////////////////////////////////////////////////////////////////
/* $pdo = null;

try {
    //$pdo = new PDO('mysql:host=localhost;dbname=spy;charset=utf8', 'root', '');
    $pdo = new PDO('mysql:host=91.216.107.161;dbname=fatab195806_9ectvj;charset=utf8', 'fatab195806', '!Angular20');
    } catch (PDOException $e) {
        exit('Erreur : '.$e->getMessage());
    } */
    require_once('modeles/ConnectMe.php');

////////////////////////////////////////////////////////////////

/* require_once('modeles/Missions.php');
$missions = new Missions();
$mission = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $missions = $missions->listerMission($_GET['id']);
} */
require_once('controleurs/controleurMission.php');
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

$controleurMission = new ControleurMission($pdo);
$mission = new Mission($pdo);
//var_dump(json_encode($_GET));
// Par défaut, mission.php affiche la mission sans formulaire
if (isset($_POST['page']) && 'missions' === $_POST['page'] &&  isset($_POST['action']) && 'update' === $_POST['action']) {
    // UPDATE MISSION - Cibles
    if(isset($_POST['module']) && 'cible' === $_POST['module']) {
        
        $controleurMission->updateMissionCible($_POST['nouvelleCible'], $_POST['id']);
        $mission = $mission->afficherMission($_POST['id']);
    } else if(isset($_POST['module']) && 'contact' === $_POST['module']) {
     // UPDATE MISSION - Contacts   
        $controleurMission->updateMissionContact($_POST['nouveauContact'], $_POST['id']);
        $mission = $mission->afficherMission($_POST['id']);
    } else if(isset($_POST['module']) && 'agent' === $_POST['module']) {
        // UPDATE MISSION - Agents
           $controleurMission->updateMissionAgent($_POST['nouvelAgent'], $_POST['id']);
           $mission = $mission->afficherMission($_POST['id']);
       } else if(isset($_POST['module']) && 'planque' === $_POST['module']) {
        // UPDATE MISSION - Planques
           $controleurMission->updateMissionPlanque($_POST['nouvellePlanque'], $_POST['id']);
           $mission = $mission->afficherMission($_POST['id']);
       }
    
    
    else if(isset($_POST['module']) && 'mission' === $_POST['module']) {
        // UPDATE MISSION - Données générales
        $controleurMission->updateMission($_POST['id'], $_POST['nom_de_code'], $_POST['pays'], $_POST['specialite'], 
        $_POST['type_de_mission'], $_POST['date_debut'], $_POST['date_fin'], $_POST['statut']);
        $mission = $mission->afficherMission($_POST['id']);
    }


    //var_dump($mission);
} // Supprimer une personne de la mission
else if(isset($_GET['page']) && 'mission' === $_GET['page'] && 'delete' === $_GET['action'] && 'personne' === $_GET['module'] && isset($_GET['id_personne']) && isset($_GET['id'])) {
    $controleurMission->deletePersonneMission($_GET['id_personne'], $_GET['id']);
    $mission = $mission->afficherMission($_GET['id']);
  


} // Supprimer une planque de la mission
else if(isset($_GET['page']) && 'mission' === $_GET['page'] && 'delete' === $_GET['action'] && 'planque' === $_GET['module'] && isset($_GET['id_planque']) && isset($_GET['id'])) {
    $controleurMission->deletePlanqueMission($_GET['id_planque'], $_GET['id']);
    $mission = $mission->afficherMission($_GET['id']);
  


}
 else if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $mission = $mission->afficherMission($_GET['id']);
} else {
    echo "<div>Cette page ne comporte pas d'identifiant de mission</div>";
}

// FIN du CONTROLEUR MISSION



// Pour le moment, affiche 1 planque dont $_GET['id'] est l'ID d'une mission.
//$planque = new Planque();
//if (isset($_GET['id']) && is_numeric($_GET['id'])) {
//    $planque = $planque->afficherPlanque($_GET['id']);
//}


$planques = new Planques($pdo);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $planques = $planques->listerPlanquesDUneMission($_GET['id']);
} else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $planques = $planques->listerPlanquesDUneMission($_POST['id']);
}


$cibles = new Personnes($pdo);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $cibles = $cibles->listerPersonnesDUneMission($_GET['id'], "cible");
} else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $cibles = $cibles->listerPersonnesDUneMission($_POST['id'], "cible");
}


$contacts = new Personnes($pdo);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $contacts = $contacts->listerPersonnesDUneMission($_GET['id'], "contact");
} else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $contacts = $contacts->listerPersonnesDUneMission($_POST['id'], "contact");
}

$agents = new Personnes($pdo);
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $agents = $agents->listerPersonnesDUneMission($_GET['id'], "agent");
} else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $agents = $agents->listerPersonnesDUneMission($_POST['id'], "agent");
}


require_once('vues/affiche-mission.php');
?>

<!-- Bouton RETOUR à la liste des MISSIONS -->
<div class="text-center mb-5">
        <a href="index.php?page=missions" class="btn btn-primary mt-3">Retour à la liste des missions</a>
</div>