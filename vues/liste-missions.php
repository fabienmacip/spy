<?php
$titre = 'Liste des missions';
$listePays = new Payss();
$listeSpecialites = new Specialites();
$listeTypeMissions = new TypeMissions();
$listePlanques = new Planques();
$listePersonnes = new Personnes();

ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">

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

    <?php
        if(isset($missionToUpdate)) {?>
        <div class="mission-updated"><?= $missionToUpdate ?></div>
        <?php
        }
    ?>


<!-- ######################## DEBUT FORM AJOUT MISSION #################### -->

    <form method="post" action="index.php" id="form-create-mission" class="mt-3 bg-info">
        <h4>Ajouter une mission</h4>    
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" maxlength="60" id="titre" placeholder="Titre" class="form-control" aria-describedby="titreHelpBlock">
            <small id="titreHelpBlock" class="form-text text-muted">
                Maximum 60 caract&egrave;res.
            </small><br/>
            <label for="nom_de_code">Nom de code</label>
            <input type="text" name="nom_de_code" maxlength="40" id="nom_de_code" placeholder="Nom de code" class="form-control" aria-describedby="nom_de_codeHelpBlock">
            <small id="nom_de_codeHelpBlock" class="form-text text-muted">
                Maximum 40 caract&egrave;res.
            </small>
        </div>

        <div class="form-group">
            <label for="date_debut">Date d&eacute;but</label>
            <input type="date" name="date_debut" id="date_debut" placeholder="Date début" min="2021-09-29" max="2050-12-31" class="form-control">
            <label for="date_fin">Date fin</label>
            <input type="date" name="date_fin" id="date_fin" placeholder="Date fin" min="2021-09-29" max="2050-12-31" class="form-control">            
        </div>


        <!-- Liste déroulante PAYS -->
        <div class="form-group">
            <label class="my-1 mx-2" for="pays">Pays</label>
              <select class="custom-select my-1 mr-sm-2" id="pays" name="pays">
              <?php
              foreach ($listePays->listerPaysJson() as $pays): 
                echo "<option value=\"".$pays[0]."\">".$pays[1]."</option>";
              endforeach;              
              ?>  
            </select>
        </div>

        <!-- Liste déroulante SPECIALITE -->

        <!-- Liste déroulante TYPE DE MISSION -->

        <!-- Boutons radio STATUT -->
        <div id="statut">
            <label>Statut</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="preparation" value="preparation" checked>
                <label class="form-check-label" for="preparation">
                    En pr&eacute;paration
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="cours" value="cours">
                <label class="form-check-label" for="cours">
                    En cours
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="terminee" value="terminee">
                <label class="form-check-label" for="terminee">
                Termin&eacute;e
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="statut" id="echec" value="echec">
                <label class="form-check-label" for="echec">
                Echec
                </label>
            </div>
        </div>

        <!-- Cases à cocher PLANQUES -->
        <!-- Dans le même pays que la mission -->
        <div id="listePlanques">
        <label>Planques</label><br/>
        <?php foreach ((array) $listePlanques->lister() as $unePlanque) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="planques[]" value="<?= $unePlanque->getId() ?>" id="pl<?= $unePlanque->getId() ?>">
                    <label class="form-check-label" for="pl<?php echo $unePlanque->getId(); ?>">
                        <?php echo $unePlanque->getCode()." (". $unePlanque->getVille().")"; ?>
                    </label>
                </div>
        <?php endforeach; ?>
        </div>

        <!-- Cases à cocher PERSONNES -->
            <!-- AGENTS -->
            <!-- Au moins 1 agent de la spécialité de la mission -->

            <!-- CIBLES -->
            <!-- Pas la même nationalité que les agents -->
            
            <!-- CONTACTS -->
            <!-- Nationalité du pays de la mission -->


        <!-- Valeurs cachées -->
        <input type="hidden" name="action" id="action" value="create">
        <input type="hidden" name="page" id="page" value="missions" >

        <div class="form-group">
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" id="btn-create-personne" class="btn btn-primary" disabled="true">Envoyer</button>
        </div>
    </form>

<!-- ******************** FIN FORM AJOUT MISSION ************************* -->


        <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
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
    <div class="col-1">
    </div>
  </div>
</div>

		
<?php
$contenu = ob_get_clean();
require_once('layout.php');