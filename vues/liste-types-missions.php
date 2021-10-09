<?php
$titre = 'Liste des types de missions';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">

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

<div class="mt-2">
    <a href="#form-create-type-mission">Ajouter un type de mission</a>
</div>



    <div class="table-responsive">
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

    <!-- ######################## DEBUT FORM AJOUT TYPE MISSION #################### -->

<form method="post" action="index.php" id="form-create-type-mission" class="mt-3 rounded py-3 px-1 bg-info">
        <h4>Ajouter un type de mission</h4>
        <div class="row">
            <div class="col-12 col-md-6">
                <!-- <label for="nom">Intitul&eacute;</label> -->
                <input type="text" name="intitule" class="form-control" maxlength="60" id="intitule" placeholder="Intitulé du type de mission">
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <input type="hidden" name="action" id="action" value="create">
                <input type="hidden" name="page" id="page" value="typemissions">
                <button type="reset">Reset</button>
                <button type="submit">Envoyer</button>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>            
    </form>

<!-- ******************** FIN FORM AJOUT TYPE MISSION ************************* -->

    </div>
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
  </div>
</div>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');