<?php

class Planque
{
    use Modele;

// Ajouter les champs d'une planque

    // Table PLANQUE
    private $id;
    private $code;
    private $adresse;
    private $ville;
    private $pays;

    public function afficherPlanque($id)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->prepare('SELECT * FROM mission WHERE id = ?');
            $stmt = $this->pdo->prepare('SELECT *
            FROM planque
            WHERE id = ?');
        }
        $planque = null;
        if ($stmt->execute([$id])) {
            $planque = $stmt->fetchObject('Planque');
            if(!is_object($planque)) {
                $planque = null;
            }
        }

        return $planque;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
	
	public function getVille()
    {
        return $this->ville;
    }
	
	public function getPays()
    {
        return $this->pays;
    }
	
}