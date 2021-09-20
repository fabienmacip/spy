<?php
require_once('modeles/Modele.php');

class Missions
{
    use Modele;

    public function listerMissions()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM mission');
        }
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission')) {
            $missions[] = $mission;
        }

        return $missions;
    }
}