<?php

class Series
{
    use Modele;

    public function listerSeries()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM serie');
        }
        $series = [];
        while ($serie = $stmt->fetchObject('Serie')) {
            $series[] = $serie;
        }

        return $series;
    }
}