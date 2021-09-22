<?php

class Specialites
{
    use Modele;

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM specialite');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Specialite')) {
            $liste[] = $element;
        }

        return $liste;
    }
}