<?php
$titre = 'Liste des personnes';
$listePays = new Payss();
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">

    <?php
        if(isset($personneToDelete)) {?>
        <div class="personne-deleted"><?= $personneToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($personneToCreate)) {?>
        <div class="personne-created"><?= $personneToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($personneToUpdate)) {?>
        <div class="personne-updated"><?= $personneToUpdate ?></div>
        <?php
        }
    ?>


<!-- ######################## DEBUT FORM AJOUT PERSONNE #################### -->

    <form method="post" action="index.php" class="mt-3 bg-info">
        <h4>Ajouter une personne</h4>    
        <div class="form-group">
            <label for="code">Nom</label>
            <input type="text" name="nom" maxlength="40" id="nom" placeholder="Nom" class="form-control" aria-describedby="nomHelpBlock">
            <small id="nomHelpBlock" class="form-text text-muted">
                Nom de famille.
            </small><br/>
            <label for="code">Pr&eacute;nom</label>
            <input type="text" name="prenom" maxlength="30" id="prenom" placeholder="Prénom" class="form-control" aria-describedby="prenomHelpBlock">
            <small id="nomHelpBlock" class="form-text text-muted">
                Pr&eacute;nom.
            </small>
        </div>

        <div class="form-group">
            <label for="dob">Date de naissance</label>
            <input type="text" name="dob" maxlength="50" id="dob" placeholder="Date de naissance" class="form-control">
            <label for="secret_code">Code secret</label>
            <input type="text" name="secret_code" maxlength="20" id="secret_code" placeholder="Code secret" class="form-control">
        </div>

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

        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="agent" value="agent">
            <label class="form-check-label" for="agent">
                Agent
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="cible" value="cible" checked>
            <label class="form-check-label" for="cible">
                Cible
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="contact" value="contact">
            <label class="form-check-label" for="contact">
                Contact
            </label>
        </div>

        <input type="hidden" name="action" id="action" value="create">
        <input type="hidden" name="page" id="page" value="personnes" >

        <div class="form-group">
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit"class="btn btn-primary">Envoyer</button>
        </div>
    </form>

<!-- ******************** FIN FORM AJOUT PERSONNE ************************* -->


      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des personnes</caption>
          <thead class="table-dark">
              <tr>
                  <th width="5%">Id</th>
                  <th width="15%">Nom</th>
                  <th width="15%">Pr&eacute;nom</th>
                  <th width="10%">Date naissance</th>
                  <th width="10%">Nom de code</th>
                  <th width="15%">Nationalit&eacute;</th>
                  <th width="6%">Type</th>
                  <th width="24%" colspan="2"></th>
              </tr>
          </thead>
          
          <tbody>
              <?php 
                $dernierType = '';
                foreach ($personnes as $personne): 
                  // Changer de type de personne : agent, cible ou contact. => on inclus une ligne de sous-titre.
                  if($personne->getType() !== $dernierType) { ?>
                    <tr class="table-info">
                        <td colspan='9'>
                            <?= ucwords($personne->getType())."s" ?>
                        </td>
                    </tr>
                  <?php } ?>
                  <tr id="tr<?= $personne->getId() ?>">
                      <td>
                          <?= $personne->getId() ?>
                      </td>
                      <td>
                          <?= $personne->getNom() ?>
                      </td>
                      <td>
                          <?= $personne->getPrenom() ?>
                      </td>
                      <td>
                          <?= $personne->getDob() ?>
                      </td>
                      <td>
                          <?= $personne->getSecretCode() ?>
                      </td>
                      <td>
                          <?= $personne->getPaysNom() ?>
                      </td>                            
                      <td>
                          <?= $personne->getType() ?>
                      </td>                                                            
                      <td>
                          <button type="button" id="updatePersonne<?= $personne->getId() ?>" class="updatePersonne btn-primary" 
                                  onclick=displayUpdatePersonne(<?php echo $personne->getId().",'".str_replace(" ","&nbsp;",$personne->getNom())."','".str_replace(" ","&nbsp;",$personne->getPrenom())."','".$personne->getDob()."','".str_replace(" ","&nbsp;",$personne->getNationalite())."','".$personne->getNationalite()."','".str_replace(" ","&nbsp;",$personne->getType())."'" ?>)
                          >
                          Modifier
                          </button>
                      </td>
                      <td>
                          <button type="button" class="btn-primary" 
                          onclick=confirmeSuppressionPersonne(<?php echo $personne->getId().",'".str_replace(" ","&nbsp;",$personne->getNom())."','".str_replace(" ","&nbsp;",$personne->getPrenom())."'" ?>)>
                          Supprimer
                        </button>
                       </td>                      
                    </tr>
              <?php $dernierType = $personne->getType();
                    endforeach; ?>
    
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