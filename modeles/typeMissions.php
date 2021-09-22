<?php

class TypeMissions
{
    use Modele;

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM type_de_mission');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('TypeMission')) {
            $liste[] = $element;
        }

        return $liste;
    }
}