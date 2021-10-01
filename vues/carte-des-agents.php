<!-- Liste des AGENTS -->
<?php 
        if (is_null($agents)):
        ?>
        <div class="card w-100 border-info mx-auto">
          <div class="card-body text-center">
            <h5 class="card-title">
                Agents
            </h5>
          </div>    
        </div>
       
        <?php else: ?>
            <div class="card w-100 border-info mx-auto">
                <div class="card-header text-center">
                    <h5 class="card-title">
                        Agents
                    </h5>
            </div>
            <div class="card-body">
                    <?php 
                        // Affiche des détails des agents
                        foreach ($agents as $agent): ?>
                        <div id="unAgent<?= $agent->getId() ?>" class="sous-carte p-1 my-1 rounded border border-success">
                                <h6 class="card-subtitle my-1">
                                    <span><?= $agent->getPrenom() ?> <?= strtoupper($agent->getNom()) ?></span>
                                    <button class="btn rounded lesboutons" onclick=confirmeDeleteAgent()>
                                        <img src="./img/supprimer.png" class="img-petit img-supprimer" alt="supprimer"/>
                                    </button>
                                </h6>

                            <ul class="list-group list-group-flush text-start">
                                <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $agent->getDob() ?></span></li>
                                <li class="list-group-item">Code secret : <span class="text-secondary"><?= $agent->getSecretCode() ?></span></li>
                                <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $agent->getNationalite() ?></span></li>
                                <li class="list-group-item">Sp&eacute;cialit&eacute;s : <span class="text-secondary">
                                <?php 
                                    $listeDesSpecialites = "";
                                    foreach ($agent->listerSpecialites() as $specialite): {
                                        $listeDesSpecialites = $listeDesSpecialites.$specialite["specialite"].", ";
                                    } endforeach;
                                    // On remplace la dernière virgule par un point.
                                    if($listeDesSpecialites !== "") {
                                        $listeDesSpecialites = substr($listeDesSpecialites,0,-2).".";
                                    }
                                    echo $listeDesSpecialites;
                                ?></span></li>
                            </ul>

                        </div>
                        <?php endforeach; ?>

                </div>  
                <div class="card-footer text-center">
                    <button class="btn rounded lesboutons" onclick=displayAddAgent()>
                        <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                    </button>
                </div>                 
            </div>

        <?php 
        // FIN du IF AGENTS
        endif; ?>
