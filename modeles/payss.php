<?php

class Payss
{
    use Modele;

    // READ
    public function listerPays()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM pays');
        }
        $payss = [];
        while ($pays = $stmt->fetchObject('Pays')) {
            $payss[] = $pays;
        }

        return $payss;
    }

    // CREATE
    public function createPays($nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "INSERT INTO pays (nom) VALUES (:nom)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom));
                if($exec){
                    $tupleCreated = "Le pays <b>".$nom."</b> a bien été ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "Le pays <b>".$nom."</b> n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function updatePays($id,$nom) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE pays SET nom = (:nom) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "Le pays <b>".$nom."</b> a bien été modifié.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "Le pays <b>".$nom."</b> n'a pas pu être modifié.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 pays de la BDD.
    public function deletePays($id, $nom)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM pays WHERE id = '.$id.'');
                $tupleDeleted = "Le pays <b>".$nom."</b> a bien été supprimé.";
            }
            catch(Exception $e) {
                $tupleDeleted = "Le pays <b>".$nom."</b> n'a pas pu être supprimé.<br/><br/>
                                Assurez-vous qu'il ne soit pas déjà utilisé dans une MISSION, une PERSONNE ou une PLANQUE";
            }
        }
        
        return $tupleDeleted;
    }

}