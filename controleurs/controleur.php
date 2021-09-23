<?php
class Controleur {

    public function afficherMissions()
    {
        $missions = new Missions();
        $missions = $missions->listerMissions();
        require_once('vues/liste-missions.php');
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
    public function listerPersonnes()
    {
        $personnes = new Personnes();
        $personnes = $personnes->lister();
        require_once('vues/liste-personnes.php');
    }
    public function listerMissions()
    {
        $missions = new Missions();
        $missions = $missions->lister();
        require_once('vues/liste-missions.php');
    }

















    // METHODES EXEMPLES

    public function afficherPhoto()
    {
        $photo = new Photo();
        $serie = new Serie();
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $photo = $photo->afficherPhoto($_GET['id']);
        }
        if (isset($photo) && !is_null($photo->getSerieid())) {
            $serie = $serie->afficherSerie($photo->getSerieid());
        }
        require_once('vues/affiche-photo.php');
    }

    public function afficherMentions()
    {
        require_once('vues/affiche-mentions.php');
    }

    public function listerSeries()
    {
        $series = new Series();
        $series = $series->listerSeries();
        require_once('vues/liste-series.php');
    }
}