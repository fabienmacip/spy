<?php

class Payss
{
    use Modele;

    public function listerPays()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM pays');
        }
        $payss = [];
        while ($pays = $stmt->fetchObject('Pays')) {
            $payss[] = $pays;
        }

        return $payss;
    }
}