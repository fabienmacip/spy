<?php

class Specialites
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM specialite ORDER BY intitule');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Specialite',[$this->pdo])) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    // READ pour listes déroulantes
    public function listerSpecialitesJson()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM specialite ORDER BY intitule');
        }
        
        while ($specialite = $stmt->fetchObject('Specialite',[$this->pdo])) {
            $specialites[] = [$specialite->getId(), $specialite->getIntitule()];
        }
        $stmt->closeCursor();
        return $specialites;
    }


    // CREATE
    public function createSpecialite($nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO specialite (intitule) VALUES (:nom)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom));
                if($exec){
                    $tupleCreated = "La spécialité <b>".$nom."</b> a bien été ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "La spécialité <b>".$nom."</b> n'a pas pu être ajoutée.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function updateSpecialite($id,$nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE specialite SET intitule = (:nom) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "La spécialité <b>".$nom."</b> a bien été modifiée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La spécialité <b>".$nom."</b> n'a pas pu être modifiée.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 pays de la BDD.
    public function deleteSpecialite($id, $nom)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM specialite WHERE id = '.$id.'');
                $tupleDeleted = "La spécialité <b>".$nom."</b> a bien été supprimée.";
            }
            catch(Exception $e) {
                $tupleDeleted = "La spécialité <b>".$nom."</b> n'a pas pu être supprimée.<br/><br/>
                                Assurez-vous qu'elle ne soit pas déjà utilisée dans une MISSION ou une PERSONNE.";
            }
        }
        
        return $tupleDeleted;
    }
    
}