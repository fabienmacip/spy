<?php
$titre = 'Liste des spécialités';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">

    <?php
        if(isset($specialiteToDelete)) {?>
        <div class="specialite-deleted"><?= $specialiteToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($specialiteToCreate)) {?>
        <div class="specialite-created"><?= $specialiteToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($specialiteToUpdate)) {?>
        <div class="specialite-updated"><?= $specialiteToUpdate ?></div>
        <?php
        }
    ?>


<!-- ######################## DEBUT FORM AJOUT SPECIALITE #################### -->

    <form method="post" action="index.php" class="mt-3 bg-info">
    <h4>Ajouter une sp&eacute;cialit&eacute;</h4>    
    <label for="nom">Intitul&eacute; de la sp&eacute;cialit&eacute;</label>
        <input type="text" name="intitule" maxlength="50" id="intitule" placeholder="Intitulé de la spécialité">

        <input type="hidden" name="action" id="action" value="createSpecialite">
        <input type="hidden" name="page" id="page" value="specialites">
        <button type="reset">Reset</button>
        <button type="submit">Envoyer</button>
    </form>

<!-- ******************** FIN FORM AJOUT SPECIALITE ************************* -->


      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des spécialités</caption>
          <thead class="table-dark">
              <tr>
                  <th width="10%">Id</th>
                  <th width="50%">Intutul&eacute;</th>
                  <th width="20%"></th>
                  <th width="20%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($specialites as $specialite): ?>
                  <tr id="tr<?= $specialite->getId() ?>">
                      <td>
                          <?= $specialite->getId() ?>
                      </td>
                      <td>
                          <?= $specialite->getIntitule() ?>
                      </td>
                      <td>
                          <button type="button" id="updateSpecialite<?= $specialite->getId() ?>" class="updateSpecialite btn-primary" 
                          onclick=displayUpdateSpecialite(<?php echo $specialite->getId().",'".str_replace(" ","&nbsp;",$specialite->getIntitule())."'" ?>)
                          >
                            Modifier
                          </button>
                      </td>
                      <td>
                           <button type="button" class="btn-primary" 
                                   onclick=confirmeSuppressionSpecialite(<?php echo $specialite->getId().",'".str_replace(" ","&nbsp;",$specialite->getIntitule())."'" ?>)>
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