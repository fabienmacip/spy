<?php

class Specialite
{
    use Modele;

    private $id;
    private $intitule;

    public function afficher($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM specialite WHERE id = ?');
        }
        $element = null;
        if ($stmt->execute([$id])) {
            $element = $stmt->fetchObject('Specialite',[$this->pdo]);
            if (!is_object($element)) {
                $element = null;
            }
        }
        $stmt->closeCursor();
        return $element;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIntitule()
    {
        return $this->intitule;
    }
    
}