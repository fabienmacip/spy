        <!-- Liste des CIBLES -->
        <?php 
        if (is_null($cibles)):
        ?>
        <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Cibles
                    </h5>
                </div>    
            </div>
        <div>
        <?php else: ?>
            <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Cibles
                    </h5>

                    <?php 
                        // Affiche des détails des cibles
                        foreach ($cibles as $cible): ?>

                    <h6 class="card-subtitle">
                    <?= $cible->getPrenom() ?> <?= strtoupper($cible->getNom()) ?>
                    </h6>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $cible->getDob() ?></span></li>
                        <li class="list-group-item">Code secret : <span class="text-secondary"><?= $cible->getSecretCode() ?></span></li>
                        <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $cible->getNationalite() ?></span></li>
                    </ul>

                    <?php endforeach; ?>

                </div>    
            </div>
        <div>

        <?php 
        // FIN du IF CIBLES
        endif; ?>
