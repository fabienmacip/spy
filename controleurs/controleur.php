<?php
class Controleur {

    public function afficherMissions($seek = '')
    {
        $missions = new Missions();
        $missions = $missions->lister($seek);
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
        $admin = new Administrateurs();
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
        $payss = new Payss();
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function createPays($nom)
    {
        $payss = new Payss();
        $paysToCreate = $payss->createPays($nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function updatePays($id,$nom)
    {
        $payss = new Payss();
        $paysToUpdate = $payss->updatePays($id,$nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

    public function deletePays($id,$nom)
    {
        $payss = new Payss();
        $paysToDelete = $payss->deletePays($id, $nom);
        $payss = $payss->listerPays();
        require_once('vues/liste-pays.php');
    }

// SPECIALITES - CRUD

    public function listerSpecialites()
    {
        $specialites = new Specialites();
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function createSpecialite($nom)
    {
        $specialites = new Specialites();
        $specialiteToCreate = $specialites->createSpecialite($nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function updateSpecialite($id,$nom)
    {
        $specialites = new Specialites();
        $specialiteToUpdate = $specialites->updateSpecialite($id,$nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

    public function deleteSpecialite($id,$nom)
    {
        $specialites = new Specialites();
        $specialiteToDelete = $specialites->deleteSpecialite($id, $nom);
        $specialites = $specialites->lister();
        require_once('vues/liste-specialites.php');
    }

// TYPES de MISSIONS - CRUD

    public function listerTypesMissions()
    {
        $typeMissions = new TypeMissions();
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function createTypeMission($nom)
    {
        $typeMissions = new TypeMissions();
        $typeMissionToCreate = $typeMissions->create($nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function updateTypeMission($id,$nom)
    {
        $typeMissions = new TypeMissions();
        $typeMissionToUpdate = $typeMissions->update($id,$nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

    public function deleteTypeMission($id,$nom)
    {
        $typeMissions = new TypeMissions();
        $typeMissionToDelete = $typeMissions->delete($id, $nom);
        $typeMissions = $typeMissions->lister();
        require_once('vues/liste-types-missions.php');
    }

// TYPES de PLANQUES - CRUD

public function listerTypesPlanques()
{
    $typePlanques = new TypePlanques();
    $typePlanques = $typePlanques->lister();
    require_once('vues/liste-types-planques.php');
}

public function createTypePlanque($nom)
{
    $typePlanques = new TypePlanques();
    $typePlanqueToCreate = $typePlanques->create($nom);
    $typePlanques = $typePlanques->lister();
    require_once('vues/liste-types-planques.php');
}

public function updateTypePlanque($id,$nom)
{
    $typePlanques = new TypePlanques();
    $typePlanqueToUpdate = $typePlanques->update($id,$nom);
    $typePlanques = $typePlanques->lister();
    require_once('vues/liste-types-planques.php');
}

public function deleteTypePlanque($id,$nom)
{
    $typePlanques = new TypePlanques();
    $typePlanqueToDelete = $typePlanques->delete($id, $nom);
    $typePlanques = $typePlanques->lister();
    require_once('vues/liste-types-planques.php');
}




// ADMINISTRATEUR - CRUD

    public function listerAdministrateurs()
    {
        $administrateurs = new Administrateurs();
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function createAdministrateur($nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs();
        $administrateurToCreate = $administrateurs->create($nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function updateAdministrateur($id,$nom, $prenom, $mail, $mot_de_passe)
    {
        $administrateurs = new Administrateurs();
        $administrateurToUpdate = $administrateurs->update($id,$nom, $prenom, $mail, $mot_de_passe);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

    public function deleteAdministrateur($id,$nom,$prenom)
    {
        $administrateurs = new Administrateurs();
        $administrateurToDelete = $administrateurs->delete($id, $nom, $prenom);
        $administrateurs = $administrateurs->lister();
        require_once('vues/liste-administrateurs.php');
    }

// PLANQUES - CRUD

    public function listerPlanques()
    {
        $planques = new Planques();
        $planques = $planques->lister();
        require_once('vues/liste-planques.php');
    }

    public function createPlanque($code, $adresse, $ville, $pays, $type)
    {
        $planques = new Planques();
        $planqueToCreate = $planques->create($code, $adresse, $ville, $pays, $type);
        $planques = $planques->lister();
        require_once('vues/liste-planques.php');
    }

    public function updatePlanque($id,$code, $adresse, $ville, $pays, $type)
    {
        $planques = new Planques();
        $planqueToUpdate = $planques->update($id,$code, $adresse, $ville, $pays, $type);
        $planques = $planques->lister();
        require_once('vues/liste-planques.php');
    }

    public function deletePlanque($id,$code,$ville)
    {
        $planques = new Planques();
        $planqueToDelete = $planques->delete($id, $code, $ville);
        $planques = $planques->lister();
        require_once('vues/liste-planques.php');
    }


// PERSONNES - CRUD

    public function listerPersonnes()
    {
        $personnes = new Personnes();
        $personnes = $personnes->lister();
        require_once('vues/liste-personnes.php');
    }

    public function createPersonne($nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites = [])
    {
        $personnes = new Personnes();
        $personneToCreate = $personnes->create($nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites);
        $personnes = $personnes->lister();
        require_once('vues/liste-personnes.php');
    }

    public function updatePersonne($id,$nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites = [])
    {
        $personnes = new Personnes();
        $personneToUpdate = $personnes->update($id,$nom, $prenom, $dob, $secret_code, $nationalite, $type, $specialites);
        $personnes = $personnes->lister();
        require_once('vues/liste-personnes.php');
    }

    public function deletePersonne($id,$nom,$prenom)
    {
        $personnes = new Personnes();
        $personneToDelete = $personnes->delete($id, $nom, $prenom);
        $personnes = $personnes->lister();
        require_once('vues/liste-personnes.php');
    }


// MISSIONS - CRUD
    
    public function listerMissions()
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

    public function updateMission($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = [])
    {
        $missions = new Missions();
        $missionToUpdate = $missions->update($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques, $personnes);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

    public function deleteMission($id,$titre,$nom_de_code)
    {
        $missions = new Missions();
        $missionToDelete = $missions->delete($id, $titre, $nom_de_code);
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

}