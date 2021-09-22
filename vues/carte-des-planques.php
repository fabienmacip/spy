<?php
?>
<!-- #####################  DEBUT PLANQUE ########################## -->
        <!-- Liste des PLANQUES -->
        <?php 
        if (is_null($planques)):
        ?>
        <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Planques
                    </h5>
                </div>    
            </div>
        <div>
        <?php else: ?>
            <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Planques
                    </h5>

                    <?php 
                        // Affiche des détails des planques
                        foreach ($planques as $planque): ?>

                        <h6 class="card-subtitle">
                        <?= $planque->getCode() ?>
                        </h6>
                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item">Adresse : <span class="text-secondary"><?= $planque->getAdresse() ?></span></li>
                            <li class="list-group-item">Ville : <span class="text-secondary"><?= $planque->getVille() ?></span></li>
                            <li class="list-group-item">Pays : <span class="text-secondary"><?= $planque->getPays() ?></span></li>
                        </ul>

                    <?php endforeach; ?>

                </div>    
            </div>
        <div>

        <?php 
        // FIN du IF PLANQUES
        endif; ?>

<!-- *********************  FIN PLANQUES *********************** -->