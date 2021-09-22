<?php

class Mission
{
    use Modele;

// Ajouter les champs d'une mission

    // Table MISSION
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

    // Table PLANQUE
    private $pl_id;
    private $pl_code;
    private $pl_adresse;
    private $pl_ville;

    public function afficherMission($id)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->prepare('SELECT * FROM mission WHERE id = ?');
            $stmt = $this->pdo->prepare('SELECT m.id AS id, m.titre AS titre, m.description AS description, 
            m.nom_de_code AS nom_de_code, p.nom AS pays, s.intitule AS specialite, t.intitule AS type_de_mission, 
            m.date_debut AS date_debut, m.date_fin AS date_fin, m.statut AS statut
            FROM mission AS m, type_de_mission AS t, pays AS p, specialite AS s
            WHERE m.pays = p.id AND m.type_de_mission = t.id AND m.specialite = s.id AND m.id = ?');
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