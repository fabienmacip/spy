<?php

class TypePlanque
{
    use Modele;

    private $id;
    private $intitule;

    public function afficherPlanque($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM type_de_planque WHERE id = ?');
        }
        $pays = null;
        if ($stmt->execute([$id])) {
            $pays = $stmt->fetchObject('TypePlanque',[$this->pdo]);
            if (!is_object($pays)) {
                $pays = null;
            }
        }
        $stmt->closeCursor();
        return $pays;
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