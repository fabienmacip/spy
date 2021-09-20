<?php

class Mission
{
    use Modele;

// Ajouter les champs d'une mission

    private $id;

    private $titre;

    private $description;
	
	private $nom_de_code;
	
	private $pays;
	
	private $specialite;
	
	private $type_de_mission;
	
	private $date_debut;
	
	private $date_fin;
	
	private $statut;

    public function afficherMission($id)
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->prepare('SELECT * FROM mission WHERE id = ?');
        }
        $mission = null;
        if ($stmt->execute([$id])) {
            $mission = $stmt->fetchObject('Mission');
            if(!is_object($mission)) {
                $mission = null;
            }
        }

        return $mission;
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
	
	public function getNomDeCode()
    {
        return $this->nom_de_code;
    }
	
	public function getPays()
    {
        return $this->pays;
    }
	
	public function getSpecialite()
    {
        return $this->specialite;
    }
	
	public function getTypeDeMission()
    {
        return $this->type_de_mission;
    }
	
	public function getDateDebut()
    {
        return $this->date_debut;
    }
	
	public function getDateFin()
    {
        return $this->date_fin;
    }
	
	public function getStatut()
    {
        return $this->statut;
    }
	
}