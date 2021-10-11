<?php

class TypeMissions
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM type_de_mission');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('TypeMission')) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    // READ pour listes déroulantes
    public function listerTypeMissionsJson()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM type_de_mission ORDER BY intitule');
        }
        
        while ($typeMission = $stmt->fetchObject('TypeMission')) {
            $typeMissions[] = [$typeMission->getId(), $typeMission->getIntitule()];
        }

        return $typeMissions;
    }


    // CREATE
    public function create($nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO type_de_mission (intitule) VALUES (:nom)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom));
                if($exec){
                    $tupleCreated = "Le type de mission <b>".$nom."</b> a bien été ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "Le type de mission <b>".$nom."</b> n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function update($id,$nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE type_de_mission SET intitule = (:nom) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "Le type de mission <b>".$nom."</b> a bien été modifié.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "Le type de mission <b>".$nom."</b> n'a pas pu être modifié.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 type_de_mission de la BDD.
    public function delete($id, $nom)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM type_de_mission WHERE id = '.$id.'');
                $tupleDeleted = "Le type de mission <b>".$nom."</b> a bien été supprimé.";
            }
            catch(Exception $e) {
                $tupleDeleted = "Le type de mission <b>".$nom."</b> n'a pas pu être supprimé.<br/><br/>
                                Assurez-vous qu'elle ne soit pas déjà utilisée dans une MISSION.";
            }
        }
        
        return $tupleDeleted;
    }
     
}