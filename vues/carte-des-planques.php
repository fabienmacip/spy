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
                                <button class="btn rounded lesboutons" onclick=confirmeDeletePlanque()>
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
                    <button class="btn rounded lesboutons" onclick=displayAddPlanque()>
                        <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                    </button>
                </div>

            </div>
          

        <?php 
        // FIN du IF PLANQUES
        endif; ?>

<!-- *********************  FIN PLANQUES *********************** -->