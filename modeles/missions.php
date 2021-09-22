<?php
require_once('modeles/Modele.php');

class Missions
{
    use Modele;

    public function listerMissions()
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            $stmt = $this->pdo->query('SELECT m.id AS id, m.titre AS titre, m.nom_de_code AS nom_de_code, 
                    p.nom AS pays, s.intitule AS specialite, t.intitule AS type_de_mission, 
                    m.date_debut AS date_debut, m.date_fin AS date_fin, m.statut AS statut
                    FROM mission AS m, type_de_mission AS t, pays AS p, specialite AS s
                    WHERE m.pays = p.id AND m.type_de_mission = t.id AND m.specialite = s.id');

        }
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission')) {
            $missions[] = $mission;
        }

        return $missions;
    }
}