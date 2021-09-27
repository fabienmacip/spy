<?php
// Cible ou Contact
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
    private $specialites = [];

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

    public function listerSpecialites() {
        
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT s.id AS id, s.intitule AS specialite
            FROM personne p, agent_specialite ags, specialite s
            WHERE p.id = '. $this->id .' AND p.type= "agent" AND p.id = ags.id_agent AND s.id = ags.id_specialite');
        }
        $specialites = [];
        while ($specialite = $stmt->fetch()) {
            $specialites[] = $specialite;
        }
        //var_dump($specialites);
        return $specialites;
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

    public function getSpecialites()
    {
/*        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT id, intitule
                    FROM specialite s, agent_specialite a
                    WHERE a.id_agent = '.$this->id.' AND a.id_specialite = s.id');
        }
     
        $specialites = [];
        while ($specialite = $stmt->fetch()) {
            $specialites[] = $specialite;
        }

        
        $specialites = $stmt->fetch()[0];
        
        return $this->specialites;*/
    }

    public function getPaysNom()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT nom
                    FROM pays
                    WHERE id = '.$this->nationalite.'');

            //$stmt = $this->pdo->query('SELECT c.nom AS nom
            //FROM planque AS p, pays AS c
            //WHERE c.id = '.$this->pays.' AND p.pays = c.id ');
        }
     
        $paysNom = $stmt->fetch()[0];

        return $paysNom;
    }


}