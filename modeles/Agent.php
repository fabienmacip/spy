<?php
// Agent
class Personne
{
    use Modele;

// Ajouter les champs d'une planque

    // Table PERSONNE (type = 'cible' ou 'contact')
    private $id;
    private $nom;
    private $prenom;
    private $dob;
    private $secret_code;
    private $nationalite;
    private $type;

    // $typeDePersonne = cible, contact ou agent.
    public function afficherPersonne($id, $typeDePersonne)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT *
            FROM personne
            WHERE id = ? AND type="'. $typeDePersonne .'"');
        }
        $cible = null;
        if ($stmt->execute([$id])) {
            $cible = $stmt->fetchObject('Personne');
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