<?php

class Serie
{
    use Modele;

    private $id;

    private $titre;

    private $description;

    public function afficherSerie($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM serie WHERE id = ?');
        }
        $serie = null;
        if ($stmt->execute([$id])) {
            $serie = $stmt->fetchObject('Serie');
            if (!is_object($serie)) {
                $serie = null;
            }
        }

        return $serie;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }
}