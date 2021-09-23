<?php

class Administrateurs
{
    use Modele;

    // READ
    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM administrateur');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Administrateur')) {
            $liste[] = $element;
        }

        return $liste;
    }

    // CREATE
    public function create($nom, $prenom, $mail, $mot_de_passe) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $today = date("Y-m-d");
                
                $sql = "INSERT INTO administrateur (nom, prenom, mail, date_creation, mot_de_passe) VALUES (:nom, :prenom, :mail, :date_creation, :mot_de_passe)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, ":date_creation"=>$today, "mot_de_passe"=>$mot_de_passe));
                if($exec){
                    $tupleCreated = "L'administrateur <b>".$nom." ".$prenom."</b> a bien été ajouté.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "L'administrateur <b>".$nom." ".$prenom."</b> n'a pas pu être ajouté.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function update($id,$nom, $prenom, $mail, $mot_de_passe) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE administrateur SET nom = (:nom), prenom = (:prenom), mail = (:mail), mot_de_passe = (:mot_de_passe) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":mail"=>$mail, "mot_de_passe"=>$mot_de_passe, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "L'administrateur <b>".$nom." ".$prenom."</b> a bien été modifié.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "L'administrateur <b>".$nom." ".$prenom."</b> n'a pas pu être modifié.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 administrateur de la BDD.
    public function delete($id, $nom, $prenom)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM administrateur WHERE id = '.$id.'');
                $tupleDeleted = "L'administrateur <b>".$nom." ".$prenom."</b> a bien été supprimé.";
            }
            catch(Exception $e) {
                $tupleDeleted = "L'administrateur <b>".$nom." ".$prenom."</b> n'a pas pu être supprimé.<br/><br/>".$e;
            }
        }
        
        return $tupleDeleted;
    }
     
}