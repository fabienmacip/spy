<?php

class Cible
{
    use Modele;

// Ajouter les champs d'une planque

    // Table PERSONNE (type = 'cible')
    private $id;
    private $nom;
    private $prenom;
    private $dob;
    private $secret_code;
    private $nationalite;
    private $type;

    public function afficherCible($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT *
            FROM personne
            WHERE id = ?');
        }
        $cible = null;
        if ($stmt->execute([$id])) {
            $cible = $stmt->fetchObject('Cible');
            if(!is_object($cible)) {
                $cible = null;
            }
        }

        return $cible;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
	
	public function getDob()
    {
        return $this->dob;
    }
	
	public function getSecretCode()
    {
        return $this->secret_code;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    public function getType()
    {
        return $this->type;
    }

}