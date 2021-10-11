<?php
$titre = 'Liste des pays';
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-0 col-lg-1 col-xl-2">
    </div>
    <div class="col-12 col-lg-10 col-xl-8">

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

    <div class="mt-2">
        <a href="#form-create-pays">Ajouter un pays</a>
    </div>

    <div class="table-responsive">
        
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
                                <button type="submit" class="btn-primary" onclick=confirmeSuppressionPays(<?php echo $pays->getId().',"'.str_replace(" ","&nbsp;",$pays->getNom()).'"' ?>)>
                                    Supprimer
                                </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
              </tbody>
            </table>
    </div>
        
        <!-- ######################## DEBUT FORM AJOUT PAYS #################### -->
        
            <form method="post" action="index.php" id="form-create-pays" class="mt-3 rounded py-3 px-1 bg-info">
            <h4>Ajouter un pays</h4>    
            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- <label for="nom">Nom du pays</label> -->
                    <input type="text" name="nom" class="form-control" maxlength="50" id="nom" placeholder="Saisissez le nom du pays">
                </div>
                <div class="col-12 col-md-4 mt-3 mt-md-0">
                    <input type="hidden" name="action" id="action" value="createPays">
                    <input type="hidden" name="page" id="page" value="payss">
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
                <div class="col-0 col-md-2"></div>
            </div>
            </form>
        
        <!-- ******************** FIN FORM AJOUT PAYS************************* -->

    </div>
    <div class="col-0 col-lg-1 col-xl-2">
        </div>
    </div>
</div>



<?php
$contenu = ob_get_clean();
require_once('layout.php');