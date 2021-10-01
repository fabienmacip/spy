<?php
class ControleurMission {

  public function afficherMissions()
  {
      /* $missions = new Missions();
      $missions = $missions->lister();
      require_once('vues/affiche-mission.php'); */
  }


// MISSIONS - UPDATE par MODULES

public function updateMission($id, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut = "en cours")
{
    $missions = new Missions();
    $missionToUpdate = $missions->update($id, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut);
    /* $mission = new Mission();
    $mission = $mission->afficherMission($id);
    require_once('vues/affiche-mission.php'); */
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