<?php

class Administrateurs
{
    use Modele;

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM administrateur');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur')) {
            $liste[] = $element;
        }

        return $liste;
    }
}