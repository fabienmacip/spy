<?php
$titre = 'Liste des pays';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">

    <?php
        if(isset($paysToDelete)) {?>
        <div class="pays-deleted"><?= $paysToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($paysToCreate)) {?>
        <div class="pays-created"><?= $paysToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($paysToUpdate)) {?>
        <div class="pays-updated"><?= $paysToUpdate ?></div>
        <?php
        }
    ?>


<!-- ######################## DEBUT FORM AJOUT PAYS #################### -->

    <form method="post" action="index.php" class="mt-3 bg-info">
    <h4>Ajouter un pays</h4>    
    <label for="nom">Nom du pays</label>
        <input type="text" name="nom" maxlength="50" id="nom" placeholder="Saisissez le nom du pays">

        <input type="hidden" name="action" id="action" value="createPays">
        <input type="hidden" name="page" id="page" value="payss">
        <button type="reset">Reset</button>
        <button type="submit">Envoyer</button>
    </form>

<!-- ******************** FIN FORM AJOUT PAYS************************* -->

      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des pays</caption>
          <thead class="table-dark">
              <tr>
                  <th width="10%">Id</th>
                  <th width="50%">Nom</th>
                  <th width="20%"></th>
                  <th width="20%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($payss as $pays): ?>
                  <tr id="tr<?= $pays->getId() ?>">
                      <td>
                          <?= $pays->getId() ?>
                      </td>
                      <td>
                          <?= $pays->getNom() ?>
                      </td>
                      <td>
                          <!--<a href="pays.php?action=edit&id=--><?php //$pays->getId() ?><!--" class="link-secondary">-->
                          <button type="button" id="updatePays<?= $pays->getId() ?>" class="updatePays btn-primary" 
                          onclick=displayUpdatePays(<?php echo $pays->getId().",'".str_replace(" ","&nbsp;",$pays->getNom())."'" ?>)
                          >
                            Modifier
                          </button>
                      </td>
                      <td>
                           <button type="button" class="btn-primary" onclick=confirmeSuppressionPays(<?php echo $pays->getId().',"'.str_replace(" ","&nbsp;",$pays->getNom()).'"' ?>)>
                             Supprimer
                           </button>
                      </td>
                  </tr>
              <?php endforeach; ?>
    
          </tbody>
      </table>

    </div>
    <div class="col-3">
    </div>
  </div>
</div>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');