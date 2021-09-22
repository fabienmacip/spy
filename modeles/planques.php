<?php
require_once('modeles/Modele.php');

class Planques
{
    use Modele;

    // $id est l'ID de la MISSION dont on souhaite récupérer les planques
    public function listerPlanquesDUneMission($id)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            // id, code, adresse, ville, pays
            $stmt = $this->pdo->query('SELECT p.id AS id, p.code AS code, p.adresse AS adresse, p.ville AS ville, c.nom AS pays
                    FROM mission_planque AS mp, planque AS p, pays AS c
                    WHERE mp.id_mission = '.$id.' AND p.id = mp.id_planque AND p.pays = c.id ');

        }
        $planques = [];

        
        while ($planque = $stmt->fetchObject('Planque')) {
            $planques[] = $planque;
        }



        return $planques;
    }
}


