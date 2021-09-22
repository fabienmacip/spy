<?php
require_once('modeles/Modele.php');

class Personnes
{
    use Modele;

    // $id est l'ID de la MISSION dont on souhaite récupérer les planques
    public function listerPersonnesDUneMission($id, $typeDePersonne)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            // id,nom, prenom, dob, secret_code, nationalite, type
            $stmt = $this->pdo->query('SELECT p.id AS id, p.nom AS nom, p.prenom AS prenom, p.dob AS dob, p.secret_code AS secret_code, c.nom AS nationalite, p.type AS type
                    FROM personne AS p, mission_personne AS mp, pays AS c
                    WHERE mp.id_mission = '.$id.' AND p.id = mp.id_personne AND p.type = "'. $typeDePersonne . '" AND c.id = p.nationalite');

        }
        $cibles = [];

        while ($cible = $stmt->fetchObject('Personne')) {
            $cibles[] = $cible;
        }

        return $cibles;
    }

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM personne ORDER BY type, nom');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Personne')) {
            $liste[] = $element;
        }

        return $liste;
    }
}


