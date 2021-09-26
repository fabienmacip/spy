<?php
require_once('modeles/Modele.php');

class Personnes
{
    use Modele;

    // READ - personnes d'une mission

    // $id est l'ID de la MISSION dont on souhaite récupérer les personnes
    public function listerPersonnesDUneMission($id, $typeDePersonne)
    {
        if (!is_null($this->pdo)) {
            //$stmt = $this->pdo->query('SELECT * FROM mission');
            // id,nom, prenom, dob, secret_code, nationalite, type
            $stmt = $this->pdo->query('SELECT p.id AS id, p.nom AS nom, p.prenom AS prenom, p.dob AS dob, p.secret_code AS secret_code, c.nom AS nationalite, p.type AS type
                    FROM personne AS p, mission_personne AS mp, pays AS c
                    WHERE mp.id_mission = '.$id.' AND p.id = mp.id_personne AND p.type = "'. $typeDePersonne . '" AND c.id = p.nationalite');

        }
        $cibles = [];

        while ($cible = $stmt->fetchObject('Personne')) {
            $cibles[] = $cible;
        }

        return $cibles;
    }

    // READ - toutes les personnes

    public function lister()
    {
        if (!is_null($this->pdo)) {
            $stmt = $this->pdo->query('SELECT * FROM personne ORDER BY type, nom');
        }
        $liste = [];
        while ($element = $stmt->fetchObject('Personne')) {
            $liste[] = $element;
        }

        return $liste;
    }

    // CREATE
    public function create($nom, $prenom, $dob, $secret_code, $nationalite, $letype) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                                
                $sql = "INSERT INTO personne (nom, prenom, dob, secret_code, nationalite, type) VALUES (:nom, :prenom, :dob, :secret_code, :nationalite, :letype)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":dob"=>$dob, ":secret_code"=>$secret_code, ":nationalite"=>$nationalite, ":letype"=>$letype));
                if($exec){
                    $tupleCreated = "La personne <b><u>".$nom."</u> ".$prenom."</b> a bien été ajoutée.";
                }
            }
            catch(Exception $e) {
                $tupleCreated = "La personne <b><u>".$nom."</u> ".$prenom."</b> n'a pas pu être ajoutée.<br/><br/>".$e;
            }
        }
        
        return $tupleCreated;
    }

    // UPDATE
    public function update($id, $nom, $prenom, $dob, $secret_code, $nationalite, $type) {
        if (!is_null($this->pdo)) {
            try {
                // Requête mysql pour insérer des données
                $sql = "UPDATE personne SET nom = (:nom), prenom = (:prenom), dob = (:dob), secret_code = (:secret_code), nationalite = (:nationalite), type = (:type) WHERE id = (:id)";
                $res = $this->pdo->prepare($sql);
                $exec = $res->execute(array(":nom"=>$nom, ":prenom"=>$prenom, ":dob"=>$dob, ":secret_code"=>$secret_code, ":nationalite"=>$nationalite, ":type"=>$type, ":id"=>$id));
                if($exec){
                    $tupleUpdated = "La personne <b><u>".$nom."</u> ".$prenom."</b> a bien été modifiée.";
                }
            }
            catch(Exception $e) {
                $tupleUpdated = "La personne <b><u>".$nom."</u> ".$prenom."</b> n'a pas pu être modifiée.<br/><br/>".$e;
            }
        }
        
        return $tupleUpdated;
    }


    // DELETE
    //Supprime 1 personne de la BDD.
    public function delete($id, $nom, $prenom)
    {
        if (!is_null($this->pdo)) {
            try{
                $this->pdo->query('DELETE FROM personne WHERE id = '.$id.'');
                $tupleDeleted = "La personne <b><u>".$nom."</u> ".$prenom."</b> a bien été supprimée.";
            }
            catch(Exception $e) {
                $tupleDeleted = "La personne <b><u>".$nom."</u> ".$prenom."</b> n'a pas pu être supprimée.<br/><br/>".$e;
            }
        }
        
        return $tupleDeleted;
    }



}


