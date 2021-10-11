<?php
require_once('modeles/Modele.php');

class Planques
{
    use Modele;

    // READ - Planques d'une mission

    // $id est l'ID de la MISSION dont on souhaite récupérer les planques
    public function listerPlanquesDUneMission($id)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            // id, code, adresse, ville, pays
            $stmt = $this->pdo->query('SELECT p.id AS id, p.code AS code, p.adresse AS adresse, p.ville AS ville, c.nom AS pays, tp.intitule AS type
                    FROM mission_planque AS mp, planque AS p, pays AS c, type_de_planque AS tp
                    WHERE mp.id_mission = '.$id.' AND p.id = mp.id_planque AND p.pays = c.id AND p.type = tp.id');

        }
        $planques = [];

        
        while ($planque = $stmt->fetchObject('Planque')) {
            $planques[] = $planque;
        }
        $stmt->closeCursor();
        return $planques;
    }

    // READ - ALL

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM planque');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Planque')) {
            $liste[] = $element;
        }
        $stmt->closeCursor();
        return $liste;
    }

    // CREATE
    public function create($code, $adresse, $ville, $pays, $type) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                                
                $sql = "INSERT INTO planque (code, adresse, ville, pays, type) VALUES (:code, :adresse, :ville, :pays, :type)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":code"=>$code, ":adresse"=>$adresse, ":ville"=>$ville, ":pays"=>$pays, ":type"=>$type));
                if($exec){
                    $tupleCreated = "La planque <b>".$code." située à ".$ville."</b> a bien été ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "La planque <b>".$code." située à ".$ville."</b> n'a pas pu être ajoutée.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function update($id,$code, $adresse, $ville, $pays, $type) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE planque SET code = (:code), adresse = (:adresse), ville = (:ville), pays = (:pays), type = (:type) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":code"=>$code, ":adresse"=>$adresse, ":ville"=>$ville, "pays"=>$pays, "type"=>$type, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "La planque <b>".$code." située à ".$ville."</b> a bien été modifiée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La planque <b>".$code." située à ".$ville."</b> n'a pas pu être modifiée.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 planque de la BDD.
    public function delete($id, $code, $ville)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM planque WHERE id = '.$id.'');
                $tupleDeleted = "La planque <b>".$code." située à ".$ville."</b> a bien été supprimée.";
            }
            catch(Exception $e) {
                $tupleDeleted = "La planque <b>".$code." située à ".$ville."</b> n'a pas pu être supprimée.<br/><br/>".$e;
            }
        }
        
        return $tupleDeleted;
    }


}


