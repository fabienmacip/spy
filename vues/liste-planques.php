<?php
$titre = 'Liste des planques';
//htmlentities($_POST['taskOption'], ENT_QUOTES, "UTF-8");
// Pour liste déroulante des PAYS
$listePays = new Payss($pdo);
$listeType = new TypePlanques($pdo);

ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">

    <?php
        if(isset($planqueToDelete)) {?>
        <div class="planque-deleted"><?= $planqueToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($planqueToCreate)) {?>
        <div class="planque-created"><?= $planqueToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($planqueToUpdate)) {?>
        <div class="planque-updated"><?= $planqueToUpdate ?></div>
        <?php
        }
    ?>

    <div class="mt-2">
            <a href="#add" class="add-link">Ajouter une planque</a> - <a href="index.php?page=typeplanques">Types de planques</a>
    </div>


    
    <div class="table-responsive">

        <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
          <caption class="text-center fs-3 text-primary">Liste des planques</caption>
          <thead class="table-dark">
                  <tr>
                      <th width="5%">Id</th>
                      <th width="10%">Code</th>
                      <th width="25%">Adresse</th>
                      <th width="10%">Ville</th>
                      <th width="10%">Pays</th>
                      <th width="10%">Type</th>
                      <th width="15%"></th>
                      <th width="15%"></th>
                  </tr>
                </thead>
                
              <tbody>
                  
                  <?php foreach ($planques as $planque): ?>
                    <tr id="tr<?= $planque->getId() ?>">
                        <td>
                              <?= $planque->getId() ?>
                            </td>
                            <td>
                              <?= $planque->getCode() ?>
                            </td>
                          <td>
                              <?= $planque->getAdresse() ?>
                          </td>
                          
                          <td>
                              <?= $planque->getVille() ?>
                          </td>
    
                          <td>
                              <?= $planque->getPaysNom() ?>
                          </td>
                          <td>
                              <?= $planque->getTypeNom() ?>
                          </td>
                          <td>
                              <button type="button" id="updatePlanque<?= $planque->getId() ?>" class="updatePlanque btn-primary" 
                                onclick=displayUpdatePlanque(<?php echo $planque->getId().",'".str_replace(" ","&nbsp;",$planque->getCode())."','".str_replace(" ","&nbsp;",$planque->getAdresse())."','".str_replace(" ","&nbsp;",$planque->getVille())."','".str_replace(" ","&nbsp;",$planque->getPays())."','".str_replace(" ","&nbsp;",$planque->getType())."'" ?>)
                              >
                              Modifier
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn-primary" 
                                       onclick=confirmeSuppressionPlanque(<?php echo $planque->getId().",'".str_replace(" ","&nbsp;",$planque->getCode())."','".str_replace(" ","&nbsp;",$planque->getVille())."'" ?>)>
                                 Supprimer
                                </button>
                            </td>                      
                        </tr>
                  <?php endforeach; ?>
                  
              </tbody>
            </table>
    </div>
        
        <!-- ######################## DEBUT FORM AJOUT PLANQUE #################### -->
        
            <a id="add"></a>
            <div id="pre-form-create-planque" class="row bg-info rounded mx-0 align-items-center pt-1 mt-2">
                <div class="col-10 col-md-11">
                    <h4 class="py-2 ps-1">Ajouter une planque</h4>
                </div>
                <div class="col-2 col-md-1 justify-content-center"><img id="show-form-create-planque" class="plus-minus-circle" src="./img/plus-circle.svg"></div>
            </div>

            <form method="post" action="index.php" id="form-create-planque" class="mt-3 rounded py-3 px-1 bg-info">
                <div class="row bg-info rounded mx-0 align-items-center">
                    <div class="col-10 col-md-11">
                        <h4 class="py-2 ps-1">Ajouter une planque</h4>
                    </div>
                    <div class="col-2 col-md-1 justify-content-center"><img id="hide-form-create-planque" class="plus-minus-circle" src="./img/dash-circle.svg"></div>
                </div>                
                <div class="form-group">
                    <label for="code">Nom de code</label>
                    <input type="text" name="code" maxlength="30" id="code" placeholder="Nom de code" class="form-control" aria-describedby="codeHelpBlock">
                    <small id="codeHelpBlock" class="form-text text-muted">
                        Le nom de code comporte au maximum 30 caractères.
                    </small>
                </div>
        
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" maxlength="50" id="adresse" placeholder="Adresse" class="form-control">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" maxlength="50" id="ville" placeholder="Ville" class="form-control">
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
        
                <div class="form-group">
                    <label class="my-1 mx-2" for="type">Type</label>
                      <select class="custom-select my-1 mr-sm-2" id="type" name="type">
                      <?php
                      foreach ($listeType->listerTypePlanqueJson() as $type): 
                        echo "<option value=\"".$type[0]."\">".$type[1]."</option>";
                      endforeach;              
                      ?>  
                    </select>
                </div>
        
                <input type="hidden" name="action" id="action" value="create">
                <input type="hidden" name="page" id="page" value="planques" >
        
                <div class="form-group">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit"class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        
        <!-- ******************** FIN FORM AJOUT PLANQUE ************************* -->

    </div>
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
  </div>
</div>



		
<?php
$contenu = ob_get_clean();
require_once('layout.php');