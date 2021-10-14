<?php

class TypePlanques
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM type_de_planque');
        }
        $payss = [];
        while ($pays = $stmt->fetchObject('TypePlanque',[$this->pdo])) {
            $payss[] = $pays;
        }
        $stmt->closeCursor();
        return $payss;
    }

    // READ pour listes déroulantes
    public function listerTypePlanqueJson()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM type_de_planque ORDER BY intitule');
        }
        
        while ($pays = $stmt->fetchObject('TypePlanque',[$this->pdo])) {
            $payss[] = [$pays->getId(), $pays->getIntitule()];
        }
        $stmt->closeCursor();
        return $payss;
    }


    // CREATE
    public function create($intitule) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO type_de_planque (intitule) VALUES (:intitule)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":intitule"=>$intitule));
                if($exec){
                    $tupleCreated = "Le type de planque <b>".$intitule."</b> a bien été ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "Le type de planque <b>".$intitule."</b> n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function update($id,$intitule) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE type_de_planque SET intitule = (:intitule) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":intitule"=>$intitule, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "Le type de planque <b>".$intitule."</b> a bien été modifié.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "Le type de planque <b>".$intitule."</b> n'a pas pu être modifié.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 pays de la BDD.
    public function delete($id, $intitule)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM type_de_planque WHERE id = '.$id.'');
                $tupleDeleted = "Le type de planque <b>".$intitule."</b> a bien été supprimé.";
            }
            catch(Exception $e) {
                $tupleDeleted = "Le type de planque <b>".$intitule."</b> n'a pas pu être supprimé.<br/><br/>
                                Assurez-vous qu'il ne soit pas déjà utilisé dans une PLANQUE";
            }
        }
        
        return $tupleDeleted;
    }

    // ****************** FIN du CRUD *****************

}