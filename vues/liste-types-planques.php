<?php
$titre = 'Liste des types de planques';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">

    <?php
        if(isset($typePlanqueToDelete)) {?>
        <div class="typePlanque-deleted"><?= $typePlanqueToDelete ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($typePlanqueToCreate)) {?>
        <div class="typePlanque-created"><?= $typePlanqueToCreate ?></div>
        <?php
        }
    ?>

    <?php
        if(isset($typePlanqueToUpdate)) {?>
        <div class="typePlanque-updated"><?= $typePlanqueToUpdate ?></div>
        <?php
        }
    ?>

    <div class="mt-2">
        <a href="#form-create-type-planque">Ajouter un type de planque</a>
    </div>



    <div class="table-responsive">
        
        <table class="table table-striped table-bordered table-sm caption-top table-responsive-lg text-center">
            <caption class="text-center fs-3 text-primary">Liste des types de planques</caption>
            <thead class="table-dark">
                <tr>
                    <th width="10%">Id</th>
                    <th width="50%">Intutul&eacute;</th>
                    <th width="20%"></th>
                    <th width="20%"></th>
                </tr>
            </thead>
            
            <tbody>
                
                <?php foreach ($typePlanques as $typePlanque): ?>
                    <tr id="tr<?= $typePlanque->getId() ?>">
                        <td>
                            <?= $typePlanque->getId() ?>
                        </td>
                        <td>
                            <?= $typePlanque->getIntitule() ?>
                        </td>
                        <td>
                            <button type="button" id="updateTypePlanque<?= $typePlanque->getId() ?>" class="updateTypePlanque btn-primary" 
                                onclick=displayUpdateTypePlanque(<?php echo $typePlanque->getId().",'".str_replace(" ","&nbsp;",$typePlanque->getIntitule())."'" ?>)
                                >
                                Modifier
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn-primary" 
                            onclick=confirmeSuppressionTypePlanque(<?php echo $typePlanque->getId().",'".str_replace(" ","&nbsp;",$typePlanque->getIntitule())."'" ?>)>
                            Supprimer
                        </button>
                    </td>                      
                </tr>
                <?php endforeach; ?>
        
            </tbody>
        </table>
    </div>

<!-- ######################## DEBUT FORM AJOUT TYPE PLANQUE #################### -->

<form method="post" action="index.php" id="form-create-type-planque" class="mt-3 rounded py-3 px-1 bg-info">
        <h4>Ajouter un type de planque</h4>
        <div class="row">
            <div class="col-12 col-md-6">
                <input type="text" class="form-control" name="intitule" maxlength="40" id="intitule" placeholder="Intitulé du type de planque">
                <!-- <label for="nom" >Intitul&eacute;</label> -->
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <input type="hidden" name="action" id="action" value="create">
                <input type="hidden" name="page" id="page" value="typeplanques">
                <button type="reset">Reset</button>
                <button type="submit">Envoyer</button>
            </div>
            <div class="col-0 col-md-2"></div>
        </div>
</form>

<!-- ******************** FIN FORM AJOUT TYPE PLANQUE ************************* -->

    </div>
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
  </div>
</div>


		
<?php
$contenu = ob_get_clean();
require_once('layout.php');