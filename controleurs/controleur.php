<?php

require_once('modeles/Modele.php');
class Controleur {
     use Modele; 

    public function afficherMissions($seek = '')
    {
        $missions = new Missions($this->pdo);
        $missions = $missions->lister($seek);
        $pdo = $this->pdo;
        require_once('vues/liste-missions.php');
    }

    public function connexion() {
        require_once('vues/page-connexion.php');
    }

    public function deconnexion() {
        // Procédure de deconnexion
        $_SESSION['admin'] = 0;
        session_destroy();
        
        $this->afficherMissions();
    }

    public function verifConnexion($mail,$password) {
        $admin = new Administrateurs($this->pdo);
        $messageConnexion = "";
        if($admin->verifConnexion($mail,$password)) {
            $_SESSION['admin'] = 1;
            $this->afficherMissions();
        } else {
            $_SESSION['admin'] = 0;
            $messageConnexion = "Identifiant ou mot de passe erroné(s).";
            require_once('vues/page-connexion.php');
        }
    }

    // PAYS - CRUD

    public function listerPays()
    {
        $payss = new Payss($this->pdo);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function createPays($nom)
    {
        $payss = new Payss($this->pdo);
        $paysToCreate = $payss->createPays($nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function updatePays($id,$nom)
    {
        $payss = new Payss($this->pdo);
        $paysToUpdate = $payss->updatePays($id,$nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function deletePays($id,$nom)
    {
        $payss = new Payss($this->pdo);
        $paysToDelete = $payss->deletePays($id, $nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

// SPECIALITES - CRUD

    public function listerSpecialites()
    {
        $specialites = new Specialites($this->pdo);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function createSpecialite($nom)
    {
        $specialites = new Specialites($this->pdo);
        $specialiteToCreate = $specialites->createSpecialite($nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function updateSpecialite($id,$nom)
    {
        $specialites = new Specialites($this->pdo);
        $specialiteToUpdate = $specialites->updateSpecialite($id,$nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function deleteSpecialite($id,$nom)
    {
        $specialites = new Specialites($this->pdo);
        $specialiteToDelete = $specialites->deleteSpecialite($id, $nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

// TYPES de MISSIONS - CRUD

    public function listerTypesMissions()
    {
        $typeMissions = new TypeMissions($this->pdo);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function createTypeMission($nom)
    {
        $typeMissions = new TypeMissions($this->pdo);
        $typeMissionToCreate = $typeMissions->create($nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function updateTypeMission($id,$nom)
    {
        $typeMissions = new TypeMissions($this->pdo);
        $typeMissionToUpdate = $typeMissions->update($id,$nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function deleteTypeMission($id,$nom)
    {
        $typeMissions = new TypeMissions($this->pdo);
        $typeMissionToDelete = $typeMissions->delete($id, $nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

// TYPES de PLANQUES - CRUD

public function listerTypesPlanques()
{
    $typePlanques = new TypePlanques($this->pdo);
    $typePlanques = $typePlanques->lister();
    $pdo = $this->pdo;
    require_once('vues/liste-types-planques.php');
}

public function createTypePlanque($nom)
{
    $typePlanques = new TypePlanques($this->pdo);
    $typePlanqueToCreate = $typePlanques->create($nom);
    $typePlanques = $typePlanques->lister();
    $pdo = $this->pdo;
    require_once('vues/liste-types-planques.php');
}

public function updateTypePlanque($id,$nom)
{
    $typePlanques = new TypePlanques($this->pdo);
    $typePlanqueToUpdate = $typePlanques->update($id,$nom);
    $typePlanques = $typePlanques->lister();
    $pdo = $this->pdo;
    require_once('vues/liste-types-planques.php');
}

public function deleteTypePlanque($id,$nom)
{
    $typePlanques = new TypePlanques($this->pdo);
    $typePlanqueToDelete = $typePlanques->delete($id, $nom);
    $typePlanques = $typePlanques->lister();
    $pdo = $this->pdo;
    require_once('vues/liste-types-planques.php');
}




// ADMINISTRATEUR - CRUD

    public function listerAdministrateurs()
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function createAdministrateur($nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToCreate = $administrateurs->create($nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function updateAdministrateur($id,$nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToUpdate = $administrateurs->update($id,$nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function deleteAdministrateur($id,$nom,$prenom)
    {
        $administrateurs = new Administrateurs($this->pdo);
        $administrateurToDelete = $administrateurs->delete($id, $nom, $prenom);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

// PLANQUES - CRUD

    public function listerPlanques()
    {
        $planques = new Planques($this->pdo);
        $planques = $planques->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-planques.php');
    }

    public function createPlanque($code, $adresse, $ville, $pays, $type)
    {
        $planques = new Planques($this->pdo);
        $planqueToCreate = $planques->create($code, $adresse, $ville, $pays, $type);
        $planques = $planques->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-planques.php');
    }

    public function updatePlanque($id,$code, $adresse, $ville, $pays, $type)
    {
        $planques = new Planques($this->pdo);
        $planqueToUpdate = $planques->update($id,$code, $adresse, $ville, $pays, $type);
        $planques = $planques->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-planques.php');
    }

    public function deletePlanque($id,$code,$ville)
    {
        $planques = new Planques($this->pdo);
        $planqueToDelete = $planques->delete($id, $code, $ville);
        $planques = $planques->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-planques.php');
    }


// PERSONNES - CRUD

    public function listerPersonnes()
    {
        $personnes = new Personnes($this->pdo);
        $personnes = $personnes->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-personnes.php');
    }

    public function createPersonne($nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites = [])
    {
        $personnes = new Personnes($this->pdo);
        $personneToCreate = $personnes->create($nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites);
        $personnes = $personnes->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-personnes.php');
    }

    public function updatePersonne($id,$nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites = [])
    {
        $personnes = new Personnes($this->pdo);
        $personneToUpdate = $personnes->update($id,$nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites);
        $personnes = $personnes->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-personnes.php');
    }

    public function deletePersonne($id,$nom,$prenom)
    {
        $personnes = new Personnes($this->pdo);
        $personneToDelete = $personnes->delete($id, $nom, $prenom);
        $personnes = $personnes->lister();
        $pdo = $this->pdo;
        require_once('vues/liste-personnes.php');
    }


// MISSIONS - CRUD
    
    public function listerMissions()
    {
        $missions = new Missions($this->pdo);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

    public function createMission($titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = [])
    {
        $missions = new Missions($this->pdo);
        $missionToCreate = $missions->create($titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques, $personnes);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

    public function updateMission($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = [])
    {
        $missions = new Missions($this->pdo);
        $missionToUpdate = $missions->update($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques, $personnes);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

    public function deleteMission($id,$titre,$nom_de_code)
    {
        $missions = new Missions($this->pdo);
        $missionToDelete = $missions->delete($id, $titre, $nom_de_code);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

}