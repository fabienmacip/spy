<?php
require_once('modeles/Modele.php');

class Missions
{
    use Modele;

    public function lister($seek = '')
    {
        // Si le champ de recherche n'était pas vide, on ajoute des conditions à la clause WHERE
        if($seek !== '') {
            $seek = ' AND (m.titre LIKE \'%'.$seek.'%\' OR m.nom_de_code LIKE \'%'.$seek.'%\' OR p.nom LIKE \'%'.$seek.'%\' 
                        OR s.intitule LIKE \'%'.$seek.'%\' OR t.intitule LIKE \'%'.$seek.'%\' 
                        OR m.date_debut LIKE \'%'.$seek.'%\' OR m.date_fin LIKE \'%'.$seek.'%\' OR m.statut LIKE \'%'.$seek.'%\')';
        }
        
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            $stmt = $this->pdo->query('SELECT m.id AS id, m.titre AS titre, m.nom_de_code AS nom_de_code, 
                    p.nom AS pays, s.intitule AS specialite, t.intitule AS type_de_mission, 
                    m.date_debut AS date_debut, m.date_fin AS date_fin, m.statut AS statut
                    FROM mission AS m, type_de_mission AS t, pays AS p, specialite AS s
                    WHERE m.pays = p.id AND m.type_de_mission = t.id AND m.specialite = s.id'.$seek);

        }
        $missions = [];
        while ($mission = $stmt->fetchObject('Mission',[$this->pdo])) {
            $missions[] = $mission;
        }
        $stmt->closeCursor();
        return $missions;
    }


    // CREATE
    public function create($titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = []) {
       
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données dans la table MISSION
                                
                $sql = "INSERT INTO mission (titre, description, nom_de_code, pays, specialite, type_de_mission, date_debut, date_fin, statut) VALUES (:titre, :description, :nom_de_code, :pays, :specialite, :type_de_mission, :date_debut, :date_fin, :statut)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":titre"=>$titre, ":description"=>$description, ":nom_de_code"=>$nom_de_code, ":pays"=>$pays, ":specialite"=>$specialite, ":type_de_mission"=>$type_de_mission, 
                 ":date_debut"=>$date_debut, ":date_fin"=>$date_fin, ":statut"=>$statut ));
                if($exec){
                    $tupleCreated = "La mission <b><u>".$titre."</u>, nom de code -".$nom_de_code."-</b> a bien été ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "La mission <b><u>".$titre."</u>, nom de code -".$nom_de_code."-</b> n'a pas pu être ajoutée.<br/><br/>".$e;
            }

            // On commence par récupérer l'identifiant de la mission.
            try {
                $stmt = $this->pdo->query('SELECT id FROM mission ORDER BY id DESC LIMIT 1');
                $id_mission = $stmt->fetch()[0];
            }
            catch(Exception $e) {
                $tupleCreated .= "Erreur lors de la récupération de l'identifiant de la nouvelle Mission.";
            }
            
            // Ajout des PLANQUES
            foreach($planques as $spe):
            try {
                
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO mission_planque (id_mission, id_planque) VALUES (:id_mission, :id_planque)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_planque"=>$spe));
                if($exec){
                    
                }
            }
            catch(Exception $e) {
                $tupleCreated .= "La planque ".$spe."n'a pas pu être ajoutée.<br/><br/>".$e;
            }
            endforeach;

            // Ajout des PERSONNES
            foreach($personnes as $spe):
                try {
                    
                    // Requête mysql pour insérer des données
                    $sql = "INSERT INTO mission_personne (id_mission, id_personne) VALUES (:id_mission, :id_personne)";
                    $res = $this->pdo->prepare($sql);
                    $exec = $res->execute(array(":id_mission"=>$id_mission, ":id_personne"=>$spe));
                    if($exec){
                        
                    }
                }
                catch(Exception $e) {
                    $tupleCreated .= "La personne ".$spe."n'a pas pu être ajoutée.<br/><br/>".$e;
                }
                endforeach;
    
        } // FIN du IF PDO
        
        return $tupleCreated;
    }


    // UPDATE
    public function update($id, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE mission SET nom_de_code = (:nom_de_code), pays = (:pays), specialite = (:specialite), type_de_mission = (:type_de_mission), date_debut = (:date_debut), date_fin = (:date_fin), statut = (:statut)  WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom_de_code"=>$nom_de_code, ":pays"=>$pays, ":specialite"=>$specialite, ":type_de_mission"=>$type_de_mission, ":date_debut"=>$date_debut, ":date_fin"=>$date_fin, ":statut"=>$statut, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "Mission modifiée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La mission n'a pas pu être modifiée.<br/><br/>".$e;
            }
        }

        return $tupleUpdated;

    }

    // UPDATE
/*     public function update($id, $titre, $description, $nom_de_code, $pays, $specialite, $type_de_mission, $date_debut, $date_fin, $statut, $planques = [], $personnes = []) {
        return null;
    }
 */
    // DELETE
    //Supprime 1 mission de la BDD.
    public function delete($id, $titre, $nom_de_code)
    {

        // D'abord, suppression des tuples de la table mission_personne
        // Puis, suppression des tuples de la table mission_planque
        if (!is_null($this->pdo)) {
                try {
                    // Requête mysql pour supprimer les données dans MISSION_PERSONNE
                    $this->pdo->query('DELETE FROM mission_personne WHERE id_mission = '.$id.'');
                }
                catch(Exception $e) {  }
                try {
                    // Requête mysql pour supprimer les données dans MISSION_PLANQUE
                    $this->pdo->query('DELETE FROM mission_planque WHERE id_mission = '.$id.'');
                }
                catch(Exception $e) {  }            
            // Puis Suppression de la Mission
            try{
                $this->pdo->query('DELETE FROM mission WHERE id = '.$id.'');
                $tupleDeleted = "La mission <b><u>".$titre."</u>, nom de code -".$nom_de_code."-</b> a bien été supprimée.";
            }
            catch(Exception $e) {
                $tupleDeleted = "La mission <b><u>".$titre."</u>, nom de code -".$nom_de_code."-</b> n'a pas pu être supprimée.<br/><br/>".$e;
            }
        }
        
        return $tupleDeleted;
    }

    // DELETE 1 Personne d'une mission
    public function deletePersonneMission($id_personne, $id_mission) {
        // Suppression du tuple de la table mission_personne
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour supprimer les données dans MISSION_PERSONNE
                $this->pdo->query('DELETE FROM mission_personne WHERE id_mission = '.$id_mission.' AND id_personne = '.$id_personne.'');
            }
            catch(Exception $e) {  }
        }
        return null;
    }

    // DELETE 1 Planque d'une mission
    public function deletePlanqueMission($id_planque, $id_mission) {
        // Suppression du tuple de la table mission_planque
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour supprimer les données dans MISSION_PLANQUE
                $this->pdo->query('DELETE FROM mission_planque WHERE id_mission = '.$id_mission.' AND id_planque = '.$id_planque.'');
            }
            catch(Exception $e) {  }
        }
        return null;
    }


}