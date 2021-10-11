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
        $stmt->closeCursor();
        return $mission;
    }

    public function listerCibles() {
// REQUETE
/* 
1ère requête, qui supprimait uniquement les CIBLES qui étaient déjà dans la mission.

 SELECT p.id, p.nom
FROM personne AS p
LEFT JOIN mission_personne AS mp
ON p.id = mp.id_personne AND mp.id_mission = 1
WHERE mp.id_personne IS NULL AND p.type = 'cible'
*/

/* 
Requête finale, qui en plus, supprime les CIBLES dont le pays est le même que les AGENTS de la mission

SELECT p.id, p.nom
FROM personne AS p
LEFT JOIN mission_personne AS mp
ON p.id = mp.id_personne AND mp.id_mission = 1
WHERE mp.id_personne IS NULL AND p.type = 'cible' AND p.id NOT IN (
SELECT cible.id
FROM personne AS cible, personne AS agent, mission_personne AS mp2
WHERE mp2.id_mission = 1 AND cible.type = 'cible' AND agent.type = 'agent' AND (mp2.id_personne = cible.id OR mp2.id_personne = agent.id) AND cible.nationalite = agent.nationalite
)
 */




        $cibles = [];
          if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            $stmt = $this->pdo->query('SELECT p.id, p.nom
            FROM personne AS p
            LEFT JOIN mission_personne AS mp 
            ON p.id = mp.id_personne AND mp.id_mission = '.$this->getId().'
            WHERE mp.id_personne IS NULL AND p.type = \'cible\' AND p.id NOT IN (
                SELECT cible.id
                FROM personne AS cible, personne AS agent, mission_personne AS mp2
                WHERE mp2.id_mission = '.$this->getId().' AND cible.type = \'cible\' AND agent.type = \'agent\' AND (mp2.id_personne = cible.id OR mp2.id_personne = agent.id) AND cible.nationalite = agent.nationalite
                )');
        }
        $cibles = [];
        while ($cible = $stmt->fetch()) {
            $cibles[] = [$cible[0],$cible[1]];
        }  
/*         $cibles[] = [0,"Marcel"];
        $cibles[] = [2,"Antoine"];
        $cibles[] = [15,"José"]; */
        $stmt->closeCursor();
        return $cibles;
    }


    public function listerContacts() {
        // REQUETE
        /* 
        Les Contacts qui ne sont pas déjà dans la mission ET dont la nationalité est la même que le pays de la mission

        SELECT p.id, p.nom
        FROM personne AS p
        LEFT JOIN mission_personne AS mp
        ON p.id = mp.id_personne AND mp.id_mission = 1
        WHERE mp.id_personne IS NULL AND p.type = 'contact' AND p.nationalite IN (
        SELECT contact.nationalite
        FROM personne AS contact, mission AS m
        WHERE m.id = 1 AND contact.nationalite = m.pays
        )
         */
                $cibles = [];
                  if (!is_null($this->pdo)) {
                    //$stmt = $this->pdo->query('SELECT * FROM mission');
                    $stmt = $this->pdo->query('SELECT p.id, p.nom
                    FROM personne AS p
                    LEFT JOIN mission_personne AS mp 
                    ON p.id = mp.id_personne AND mp.id_mission = '.$this->getId().'
                    WHERE mp.id_personne IS NULL AND p.type = \'contact\' AND p.nationalite IN (
                        SELECT contact.nationalite
                        FROM personne AS contact, mission AS m
                        WHERE m.id = '.$this->getId().' AND contact.nationalite = m.pays
                        )');
                }
                $cibles = [];
                while ($cible = $stmt->fetch()) {
                    $cibles[] = [$cible[0],$cible[1]];
                }  
                $stmt->closeCursor();
                return $cibles;
            }
        


    public function listerAgents() {
        // REQUETE
       
        /* 
        Requête finale, qui en plus, supprime les CIBLES dont le pays est le même que les AGENTS de la mission
        
        SELECT p.id, p.nom
        FROM personne AS p
        LEFT JOIN mission_personne AS mp
        ON p.id = mp.id_personne AND mp.id_mission = 1
        WHERE mp.id_personne IS NULL AND p.type = 'agent' AND p.id NOT IN (
        SELECT agent.id
        FROM personne AS cible, personne AS agent, mission_personne AS mp2
        WHERE mp2.id_mission = 1 AND cible.type = 'cible' AND agent.type = 'agent' AND (mp2.id_personne = cible.id OR mp2.id_personne = agent.id) AND cible.nationalite = agent.nationalite
        )
         */
        
        
        
        
                $cibles = [];
                  if (!is_null($this->pdo)) {
                    //$stmt = $this->pdo->query('SELECT * FROM mission');
                    $stmt = $this->pdo->query('SELECT p.id, p.nom
                    FROM personne AS p
                    LEFT JOIN mission_personne AS mp 
                    ON p.id = mp.id_personne AND mp.id_mission = '.$this->getId().'
                    WHERE mp.id_personne IS NULL AND p.type = \'agent\' AND p.id NOT IN (
                        SELECT agent.id
                        FROM personne AS cible, personne AS agent, mission_personne AS mp2
                        WHERE mp2.id_mission = '.$this->getId().' AND cible.type = \'cible\' AND agent.type = \'agent\' AND (mp2.id_personne = cible.id OR mp2.id_personne = agent.id) AND cible.nationalite = agent.nationalite
                        )');
                }
                $cibles = [];
                while ($cible = $stmt->fetch()) {
                    $cibles[] = [$cible[0],$cible[1]];
                }  
                $stmt->closeCursor();
                return $cibles;
            }


    public function listerPlanques() {
        // REQUETE
        /* 
        Les Planques qui ne sont pas déjà dans la mission ET dont le pays est la même que le pays de la mission

        SELECT p.id, p.code
        FROM planque AS p
        LEFT JOIN mission_planque AS mp
        ON p.id = mp.id_planque AND mp.id_mission = 1
        WHERE mp.id_planque IS NULL AND p.pays IN (
        SELECT p2.pays
        FROM planque AS p2, mission AS m
        WHERE m.id = 1 AND p2.pays = m.pays)
            */
                $cibles = [];
                    if (!is_null($this->pdo)) {
                    //$stmt = $this->pdo->query('SELECT * FROM mission');
                    $stmt = $this->pdo->query('SELECT p.id, p.code
                    FROM planque AS p
                    LEFT JOIN mission_planque AS mp
                    ON p.id = mp.id_planque AND mp.id_mission = '.$this->getId().'
                    WHERE mp.id_planque IS NULL AND p.pays IN (
                    SELECT p2.pays
                    FROM planque AS p2, mission AS m
                    WHERE m.id = '.$this->getId().' AND p2.pays = m.pays)');
                }
                $cibles = [];
                while ($cible = $stmt->fetch()) {
                    $cibles[] = [$cible[0],$cible[1]];
                }  
                $stmt->closeCursor();
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


    public function updateMissionContact($id_personne,$id_mission){
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO mission_personne (id_mission, id_personne) VALUES (:id_mission, :id_personne)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_personne"=>$id_personne));
                if($exec){
                    $tupleUpdated = "Contact ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "Le contact n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }

        return $tupleUpdated;

    }

    public function updateMissionAgent($id_personne,$id_mission){
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO mission_personne (id_mission, id_personne) VALUES (:id_mission, :id_personne)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_personne"=>$id_personne));
                if($exec){
                    $tupleUpdated = "Agent ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "L'agent n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }

        return $tupleUpdated;

    }

    public function updateMissionPlanque($id_planque,$id_mission){
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO mission_planque (id_mission, id_planque) VALUES (:id_mission, :id_planque)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_planque"=>$id_planque));
                if($exec){
                    $tupleUpdated = "Planque ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La planque n'a pas pu être ajoutée.<br/><br/>".$e;
            }
        }

        return $tupleUpdated;

    }

// ----------------------- GETTERS -------------------------------    

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