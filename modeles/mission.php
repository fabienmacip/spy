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
    private $id_pays;
    private $pays;
	private $specialite;
    private $id_specialite;
	private $type_de_mission;
    private $id_type_de_mission;
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
            m.nom_de_code AS nom_de_code, p.id AS id_pays, p.nom AS pays, s.id AS id_specialite, 
            s.intitule AS specialite, t.id AS id_type_de_mission, t.intitule AS type_de_mission, 
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

    public function listerCibles() {
// REQUETE
/* 
 SELECT p.id, p.nom
FROM personne AS p
LEFT JOIN mission_personne AS mp
ON p.id = mp.id_personne AND mp.id_mission = 1
WHERE mp.id_personne IS NULL AND p.type = 'cible'
*/

        $cibles = [];
          if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            $stmt = $this->pdo->query('SELECT p.id, p.nom
            FROM personne AS p
            LEFT JOIN mission_personne AS mp 
            ON p.id = mp.id_personne AND mp.id_mission = '.$this->getId().'
            WHERE mp.id_personne IS NULL AND p.type = \'cible\'');
        }
        $cibles = [];
        while ($cible = $stmt->fetch()) {
            $cibles[] = [$cible[0],$cible[1]];
        }  
/*         $cibles[] = [0,"Marcel"];
        $cibles[] = [2,"Antoine"];
        $cibles[] = [15,"José"]; */
        return $cibles;
    }

    public function updateMissionCible($id_personne,$id_mission){
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO mission_personne (id_mission, id_personne) VALUES (:id_mission, :id_personne)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_personne"=>$id_personne));
                if($exec){
                    $tupleUpdated = "Cible ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La cible n'a pas pu être ajoutée.<br/><br/>".$e;
            }
        }

        return $tupleUpdated;

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
	
	public function getIdPays()
    {
        return $this->id_pays;
    }

    public function getPays()
    {
        return $this->pays;
    }
	
	public function getIdSpecialite()
    {
        return $this->id_specialite;
    }
    
	public function getSpecialite()
    {
        return $this->specialite;
    }
	
	public function getIdTypeDeMission()
    {
        return $this->id_type_de_mission;
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