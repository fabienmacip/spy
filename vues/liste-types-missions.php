<?php
$titre = 'Liste des types de missions';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">

    <?php
        if(isset($typeMissionToDelete)) {?>
        <div class="typeMission-deleted"><?= $typeMissionToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($typeMissionToCreate)) {?>
        <div class="typeMission-created"><?= $typeMissionToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($typeMissionToUpdate)) {?>
        <div class="typeMission-updated"><?= $typeMissionToUpdate ?></div>
        <?php
        }
    ?>


<!-- ######################## DEBUT FORM AJOUT TYPE MISSION #################### -->

    <form method="post" action="index.php" class="mt-3 bg-info">
        <h4>Ajouter un type de mission</h4>
        <label for="nom">Intitul&eacute; du type de mission</label>
        <input type="text" name="intitule" maxlength="60" id="intitule" placeholder="Intitulé du type de mission">

        <input type="hidden" name="action" id="action" value="create">
        <input type="hidden" name="page" id="page" value="typemissions">
        <button type="reset">Reset</button>
        <button type="submit">Envoyer</button>
    </form>

<!-- ******************** FIN FORM AJOUT TYPE MISSION ************************* -->


      <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
      <caption class="text-center fs-3 text-primary">Liste des types de missions</caption>
          <thead class="table-dark">
              <tr>
                  <th width="10%">Id</th>
                  <th width="50%">Intutul&eacute;</th>
                  <th width="20%"></th>
                  <th width="20%"></th>
              </tr>
          </thead>
          
          <tbody>
    
              <?php foreach ($typeMissions as $typeMission): ?>
                  <tr id="tr<?= $typeMission->getId() ?>">
                      <td>
                          <?= $typeMission->getId() ?>
                      </td>
                      <td>
                          <?= $typeMission->getIntitule() ?>
                      </td>
                      <td>
                          <button type="button" id="updateTypeMission<?= $typeMission->getId() ?>" class="updateTypeMission btn-primary" 
                          onclick=displayUpdateTypeMission(<?php echo $typeMission->getId().",'".str_replace(" ","&nbsp;",$typeMission->getIntitule())."'" ?>)
                          >
                            Modifier
                          </button>
                      </td>
                      <td>
                           <button type="button" class="btn-primary" 
                                   onclick=confirmeSuppressionTypeMission(<?php echo $typeMission->getId().",'".str_replace(" ","&nbsp;",$typeMission->getIntitule())."'" ?>)>
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