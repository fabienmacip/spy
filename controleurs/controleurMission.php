<?php

require_once('modeles/Modele.php');

class ControleurMission {

    use Modele; 

  public function afficherMissions()
  {
      /* $missions = new Missions();
      $missions = $missions->lister();
      require_once('vues/affiche-mission.php'); */
  }


// MISSIONS - UPDATE par MODULES

public function updateMission($id, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut = "en cours")
{
    $missions = new Missions($this->pdo);
    $missionToUpdate = $missions->update($id, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut);
    /* $mission = new Mission();
    $mission = $mission->afficherMission($id);
    require_once('vues/affiche-mission.php'); */
}

// MISSION - DELETE une PERSONNE
public function deletePersonneMission($id_personne, $id_mission) {
    $missions = new Missions($this->pdo);
    $missionToDelete = $missions->deletePersonneMission($id_personne, $id_mission);

    //var_dump("PERS : ".$id_personne. "   MISSION : ".$id_mission);
}

// MISSION - DELETE une PLANQUE
public function deletePlanqueMission($id_planque, $id_mission) {
    $missions = new Missions($this->pdo);
    $missionToDelete = $missions->deletePlanqueMission($id_planque, $id_mission);

    //var_dump("PERS : ".$id_personne. "   MISSION : ".$id_mission);
}


public function updateMissionCible($id_personne, $id_mission) {
    $mission = new Mission($this->pdo);
    $missionToUpdate = $mission->updateMissionCible($id_personne,$id_mission);
}

public function updateMissionContact($id_personne, $id_mission) {
    $mission = new Mission($this->pdo);
    $missionToUpdate = $mission->updateMissionContact($id_personne,$id_mission);
}

public function updateMissionAgent($id_personne, $id_mission) {
    $mission = new Mission($this->pdo);
    $missionToUpdate = $mission->updateMissionAgent($id_personne,$id_mission);
}

public function updateMissionPlanque($id_planque, $id_mission) {
    $mission = new Mission($this->pdo);
    $missionToUpdate = $mission->updateMissionPlanque($id_planque,$id_mission);
}


/*     public function listerMissions()
    {
        $missions = new Missions();
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

    public function createMission($titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = [])
    {
        $missions = new Missions();
        $missionToCreate = $missions->create($titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques, $personnes);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }
 */
/*     public function updateMission($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = [])
    {
        $missions = new Missions();
        $missionToUpdate = $missions->update($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques, $personnes);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }
 */
 /*    public function deleteMission($id,$titre,$nom_de_code)
    {
        $missions = new Missions();
        $missionToDelete = $missions->delete($id, $titre, $nom_de_code);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }
 */
}