<?php
$titre = 'Liste des missions';
$listePays = new Payss($pdo);
$listeSpecialites = new Specialites($pdo);
$listeTypeMissions = new TypeMissions($pdo);
$listePlanques = new Planques($pdo);
$listePersonnes = new Personnes($pdo);
$listeAgents = [];
$listeCibles = [];
$listeContacts = [];

// Création de 3 tableaux : AGENTS, CIBLES, CONTACTS
foreach ((array) $listePersonnes->lister() as $unePersonne) :
    if($unePersonne->getType() === 'agent') {
        $listeAgents[] = $unePersonne;
    } elseif($unePersonne->getType() === 'cible') {
        $listeCibles[] = $unePersonne;
    } else {
        $listeContacts[] = $unePersonne;
    }
endforeach;

ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0">
    </div>
    <div class="col-12">

    <?php
        if(isset($missionToDelete)) {?>
        <div class="mission-deleted"><?= $missionToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($missionToCreate)) {?>
        <div class="mission-created"><?= $missionToCreate ?></div>
        <?php
        }
    ?>
        <div class="row mt-2">
            <div class="col-12 col-md-6 mb-2 mb-md-0">
                <a href="#add" class="add-link">Ajouter une mission</a> - <a href="index.php?page=typemissions">Types de missions</a>
            </div>
            <div class="col-12 col-md-6">
                <form method="post" action="index.php" class="inline-form"> 
                    <input type="hidden" name="action" id="action" value="seekmission">
                    <div class="row align-items-end">
                        <div class="col-10 input-group"><div class="input-group-text"><img src="./img/search.svg"/></div><input type="text" id="seekmission" name="seekmission" maxlength="40" class="form-control"><button type="submit" class="btn btn-primary">GO !</button> </div>
                    </div>
                </form>
           </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-sm caption-top text-center">
            <caption class="text-center fs-3 text-primary">Liste des missions</caption>
                <thead class="table-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Nom de code</th>
                        <th>Pays</th>
                        <th>Sp&eacute;cialit&eacute;</th>
                        <th>Type de mission</th>
                        <th>Date d&eacute;but</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                
                <tbody>
    
                    <?php foreach ($missions as $mission): ?>
                        <tr>
                            <td>
                                <a href="mission.php?id=<?= $mission->getId() ?>" class="link-secondary">
                                    <?= $mission->getTitre() ?>
                                </a>
                            </td>
                            <td>
                                <?= $mission->getNomDeCode() ?>
                            </td>
                            <td>
                                <?= $mission->getPays() ?>
                            </td>
                            <td>
                                <?= $mission->getSpecialite() ?>
                            </td>
                            <td>
                                <?= $mission->getTypeDeMission() ?>
                            </td>
                            <td>
                                <?= //setlocale(LC_TIME, "fra", "fr_FR");
                                    strftime("%a %d %b %G",strtotime($mission->getDateDebut())); ?>
                            </td>
                            <td>
                                <?= strftime("%a %d %b %G",strtotime($mission->getDateFin())); ?>
                            </td>
                            <td>
                                <?= $mission->getStatut() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
    
                </tbody>
            </table>
        </div>


<!-- ######################## DEBUT FORM AJOUT MISSION #################### -->

<a id="add"></a>
<div id="pre-form-create-mission" class="row bg-info rounded mx-0 align-items-center pt-1 mt-2">
    <div class="col-10 col-md-11">
        <h4 class="py-2 ps-1">Ajouter une mission</h4>
    </div>
    <div class="col-2 col-md-1 justify-content-center"><img id="show-form-create-mission" class="plus-minus-circle" src="./img/plus-circle.svg"></div>
</div>


<form method="post" action="index.php" id="form-create-mission" class="mt-3 py-3 px-1 bg-info rounded">
        <div class="row bg-info rounded mx-0 align-items-center">
            <div class="col-10 col-md-11">
                <h4 class="py-2 ps-1">Ajouter une mission</h4>
            </div>
            <div class="col-2 col-md-1 justify-content-center"><img id="hide-form-create-mission" class="plus-minus-circle" src="./img/dash-circle.svg"></div>
        </div>
        <div class="form-group mb-2">
            <label for="titre">Titre</label>
            <input type="text" name="titre" maxlength="60" id="titre" placeholder="Titre" class="form-control" aria-describedby="titreHelpBlock">
            <small id="titreHelpBlock" class="form-text text-muted">
                Maximum 60 caract&egrave;res.
            </small><br/>
            <label for="nom_de_code" class="mt-2">Nom de code</label>
            <input type="text" name="nom_de_code" maxlength="40" id="nom_de_code" placeholder="Nom de code" class="form-control" aria-describedby="nom_de_codeHelpBlock">
            <small id="nom_de_codeHelpBlock" class="form-text text-muted">
                Maximum 40 caract&egrave;res.
            </small>
        </div>

        <div class="form-group mb-2">
            <label>Description</label>
            <textarea class="form-control" id="description" name="description" maxlength="800" placeholder="Détails de la mission" rows="6" aria-describedby="descriptionHelpBlock"></textarea>
            <small id="descriptionHelpBlock" class="form-text text-muted">
                Maximum 800 caract&egrave;res.
            </small>
        </div>

        <div class="row mb-3">
            <div class="form-group col-6">
                <label for="date_debut">Date d&eacute;but</label>
                <input type="date" name="date_debut" id="date_debut" placeholder="Date début" min="2021-09-29" max="2050-12-31" class="form-control">
            </div>
            <div class="form-group col-6">
                <label for="date_fin">Date fin</label>
                <input type="date" name="date_fin" id="date_fin" placeholder="Date fin" min="2021-09-29" max="2050-12-31" class="form-control">            
            </div>
       </div>



        <!-- Liste déroulante PAYS -->
        <div class="form-group mb-2">
            <label class="my-1 mx-2" for="pays">Pays</label>
              <select class="custom-select rounded my-1 mr-sm-2" id="pays" name="pays">
              <?php
              foreach ($listePays->listerPaysJson() as $pays): 
                echo "<option value=\"".$pays[0]."\">".$pays[1]."</option>";
              endforeach;              
              ?>  
            </select>
        </div>

        <!-- Liste déroulante SPECIALITE -->
        <div class="form-group mb-2">
            <label class="my-1 mx-2" for="specialite">Sp&eacute;cialit&eacute;</label>
              <select class="custom-select rounded my-1 mr-sm-2" id="specialite" name="specialite">
              <?php
              foreach ($listeSpecialites->listerSpecialitesJson() as $specialite): 
                echo "<option value=\"".$specialite[0]."\">".$specialite[1]."</option>";
              endforeach;              
              ?>  
            </select>
        </div>

        <!-- Liste déroulante TYPE DE MISSION -->
        <div class="form-group mb-2">
            <label class="my-1 mx-2" for="pays">Type de mission</label>
              <select class="custom-select rounded my-1 mr-sm-2" id="type_de_mission" name="type_de_mission">
              <?php
              foreach ($listeTypeMissions->listerTypeMissionsJson() as $typeMissions): 
                echo "<option value=\"".$typeMissions[0]."\">".$typeMissions[1]."</option>";
              endforeach;              
              ?>  
            </select>
        </div>

        <!-- Boutons radio STATUT -->
        <div id="statut" class="mb-2">
            <label>Statut</label>
            <div class="row mx-1">
                <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="statut" id="preparation" value="preparation" checked>
                    <label class="form-check-label" for="preparation">
                        En pr&eacute;paration
                    </label>
                </div>
                <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="statut" id="cours" value="cours">
                    <label class="form-check-label" for="cours">
                        En cours
                    </label>
                </div>
                <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="statut" id="terminee" value="terminee">
                    <label class="form-check-label" for="terminee">
                    Termin&eacute;e
                    </label>
                </div>
                <div class="form-check col-6">
                    <input class="form-check-input" type="radio" name="statut" id="echec" value="echec">
                    <label class="form-check-label" for="echec">
                    Echec
                    </label>
                </div>
            </div>
        </div>

        <!-- Cases à cocher PLANQUES -->
        <!-- Dans le même pays que la mission -->
        <div id="listePlanques" class="mb-2">
        <label class="mb-2">Planques</label><br/>
        <?php foreach ((array) $listePlanques->lister() as $unePlanque) : ?>
                <div class="form-check form-check-inline unePlanque" id="unePlanque<?= $unePlanque->getId() ?>">
                    <input type="hidden" name="sonPays" class="sonPays" id="sonPays<?= $unePlanque->getId() ?>" value="<?= $unePlanque->getPays() ?>">
                    <input class="form-check-input" type="checkbox" name="planques[]" value="<?= $unePlanque->getId() ?>" id="pl<?= $unePlanque->getId() ?>">
                    <label class="form-check-label" for="pl<?php echo $unePlanque->getId(); ?>">
                        <?php echo $unePlanque->getCode()." (". $unePlanque->getVille().")"; ?>
                    </label>
                </div>
        <?php endforeach; ?>
        </div>
        <hr/>

        <!-- Cases à cocher PERSONNES -->
            <!-- CIBLES -->
            <!-- Pas la même nationalité que les agents -->
            <div id="listeCibles" class="mb-2">
                <label class="mb-2">Cibles</label><br/>
                <?php foreach ((array) $listeCibles as $uneCible) : ?>
                        <div class="form-check" id="uneCible<?= $uneCible->getId() ?>">
                            <input type="hidden" name="paysCible" class="paysCible" id="paysCible<?= $uneCible->getId() ?>" value="<?= $uneCible->getNationalite() ?>">
                            <input class="form-check-input" type="checkbox" name="personnes[]" value="<?= $uneCible->getId() ?>" id="cible<?= $uneCible->getId() ?>">
                            <label class="form-check-label" for="cible<?php echo $uneCible->getId(); ?>">
                                <?php echo $uneCible->getNom()." ".$uneCible->getPrenom()." - <i>".$uneCible->getSecretCode()."</i> <img src=\"./img/globe.svg\"/> ".$uneCible->getPaysNom() ?>
                            </label>
                        </div>
                <?php endforeach; ?>
            </div>
            <hr/>

            <!-- AGENTS -->
            <!-- Au moins 1 agent de la spécialité de la mission -->
            <div id="listeAgents" class="mb-2">
                <label class="mb-2">Agents</label><br/>
                <?php foreach ((array) $listeAgents as $unAgent) : ?>
                        <div class="form-check" id="unAgent<?= $unAgent->getId() ?>">
                        <input type="hidden" name="paysAgent" class="paysAgent" id="paysAgent<?= $unAgent->getId() ?>" value="<?= $unAgent->getNationalite() ?>">
                        <input type="hidden" name="specialitesAgent" class="specialitesAgent" id="specialitesAgent<?= $unAgent->getId() ?>" value="<?= $unAgent->listerSpecialitesUneSeuleChaineId() ?>">
                            <input class="form-check-input" type="checkbox" name="personnes[]" value="<?= $unAgent->getId() ?>" id="agent<?= $unAgent->getId() ?>">
                            <label class="form-check-label" for="agent<?php echo $unAgent->getId(); ?>">
                                <?php echo $unAgent->getNom()." ".$unAgent->getPrenom()." - <i>".$unAgent->getSecretCode()."</i> <img src=\"./img/globe.svg\"/> ".$unAgent->getPaysNom()."<br />
                                <span><img src=\"./img/x-diamond.svg\"/> ".$unAgent->listerSpecialitesUneSeuleChaine()."</span>" ?>
                            </label>
                        </div>
                <?php endforeach; ?>
            </div>
            <hr/>

            <!-- CONTACTS -->
            <!-- Nationalité du pays de la mission -->
            <div id="listeContacts" class="mb-2">
                <label class="mb-2">Contacts</label><br/>
                <?php foreach ((array) $listeContacts as $unContact) : ?>
                        <div class="form-check" id="unContact<?= $unContact->getId() ?>">
                        <input type="hidden" name="paysContact" class="paysContact" id="paysContact<?= $unContact->getId() ?>" value="<?= $unContact->getNationalite() ?>">
                            <input class="form-check-input" type="checkbox" name="personnes[]" value="<?= $unContact->getId() ?>" id="contact<?= $unContact->getId() ?>">
                            <label class="form-check-label" for="contact<?php echo $unContact->getId(); ?>">
                                <?php echo $unContact->getNom()." ".$unContact->getPrenom()." - <i>".$unContact->getSecretCode()."</i> <img src=\"./img/globe.svg\"/> ".$unContact->getPaysNom() ?>
                            </label>
                        </div>
                <?php endforeach; ?>
            </div>


        <!-- Valeurs cachées -->
        <input type="hidden" name="action" id="action" value="create">
        <input type="hidden" name="page" id="page" value="missions" >

        <div class="form-group text-center mt-3">
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" id="btn-create-mission" class="btn btn-primary" disabled="true">Envoyer</button>
        </div>
    </form>

<!-- ******************** FIN FORM AJOUT MISSION ************************* -->

        </div>
    <div class="col-0">
    </div>
  </div>
</div>

		
<?php
$contenu = ob_get_clean();
require_once('layout.php');