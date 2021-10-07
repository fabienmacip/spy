<?php
?>
<!-- #####################  DEBUT PLANQUE ########################## -->
        <!-- Liste des PLANQUES -->
        <?php 
        if (is_null($planques)):
        ?>
        <div class="card w-100 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Planques
                    </h5>
                </div>    
            </div>
        <div>
        <?php else: ?>
            <div class="card w-100 border-info mx-auto">
                <div class="card-header text-center">
                    <h5 class="card-title">
                        Planques
                    </h5>
                </div>    
                <div class="card-body">
                    <?php 
                        // Affiche des détails des planques
                        foreach ($planques as $planque): ?>
                            <div id="unePlanque<?= $planque->getId() ?>" class="sous-carte p-1 my-1 rounded border border-success">     
                                <h6 class="card-subtitle my-1">
                                <?= $planque->getCode() ?>
                                <button class="btn rounded lesboutons" onclick=confirmeDeletePlanque(<?php echo $planque->getId().",\"".$planque->getCode()."\",".$mission->getId().",".$okPourDelete ?>)>
                                    <img src="./img/supprimer.png" class="img-petit img-supprimer" alt="supprimer"/>
                                </button>
                                </h6>

                                <ul class="list-group list-group-flush text-start">
                                    <li class="list-group-item">Adresse : <span class="text-secondary"><?= $planque->getAdresse() ?></span></li>
                                    <li class="list-group-item">Ville : <span class="text-secondary"><?= $planque->getVille() ?></span></li>
                                    <li class="list-group-item">Pays : <span class="text-secondary"><?= $planque->getPays() ?></span></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>

                </div>
                <div class="card-footer text-center">
                
                    <form method="post" action="mission.php" id="form-update-mission-planque" class="mt-3 bg-info">

                        <!-- Liste déroulante PLANQUES -->
                        <!-- De la même nationalité que la mission -->
                        <div id="listePlanques" class="form-group">
                            <select class="custom-select my-1 mr-sm-2" id="nouvellePlanque" name="nouvellePlanque">
                                <?php
                                foreach ($listePlanques as $elem1): 
                                echo "<option value=\"".$elem1[0]."\">".$elem1[1]."</option>";
                                endforeach;              
                                ?>  
                            </select>
                        </div>

                        <!-- Valeurs cachées -->
                        <input type="hidden" name="id" id="id" value="<?= $mission->getId() ?>">
                        <input type="hidden" name="action" id="action" value="update">
                        <input type="hidden" name="page" id="page" value="missions" >
                        <input type="hidden" name="module" id="module" value="planque" >

                        <button type="submit" class="btn rounded lesboutons" id="btn-ajout-planque" onclick=displayAddPlanque()>
                            <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                        </button>
                    </form>


                </div>

            </div>
          

        <?php 
        // FIN du IF PLANQUES
        endif; ?>

<!-- *********************  FIN PLANQUES *********************** -->