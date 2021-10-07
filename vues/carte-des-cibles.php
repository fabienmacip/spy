        <!-- Liste des CIBLES -->
        <?php 
        if (is_null($cibles)):
        ?>
        <div class="card w-100 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Cibles
                    </h5>
                </div>    
            </div>
        <?php else: ?>
            <div class="card w-100 border-info mx-auto">
                <div class="card-header text-center">
                    <h5 class="card-title">
                        Cibles
                    </h5>
                </div>
                <div class="card-body" id="lesCibles">
                    <?php 
                        // Vérification à priori de la possibilité de supprimer une cible
                        // Il faut au moins 1 cible par mission
                        if(count($cibles) > 1) {
                            //$styleDelete = '';
                            $messageDelete = '';
                            $okPourDelete = 1;
                        } else {
                            //$styleDelete = ' disabled';
                            $okPourDelete = 0;
                            $messageDelete = 'Il faut au moins une cible dans une mission';
                        }

                        // Affiche des détails des cibles
                        foreach ($cibles as $cible): ?>
                        
                        <div id="uneCible<?= $cible->getId() ?>" class="sous-carte p-1 my-1 rounded border border-success">
                            <input type="hidden" class="toto" value="<?= $cible->getId() ?>">
                            <h6 class="card-subtitle my-1">
                            <?= $cible->getPrenom() ?> <?= strtoupper($cible->getNom()) ?>
                            <button class="btn rounded lesboutons" onclick=confirmeDeleteCible(<?php echo $cible->getId().",\"".$cible->getNom()."\",".$mission->getId().",".$okPourDelete ?>)>
                                <img src="./img/supprimer.png" class="img-petit img-supprimer" alt="supprimer"/>
                            </button>

                            </h6>
                            <ul class="list-group list-group-flush text-start">
                                <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $cible->getDob() ?></span></li>
                                <li class="list-group-item">Code secret : <span class="text-secondary"><?= $cible->getSecretCode() ?></span></li>
                                <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $cible->getNationalite() ?></span></li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    
                </div>                
                <div class="card-footer text-center">
                
                    <form method="post" action="mission.php" id="form-update-mission-cible" class="mt-3 bg-info">

                        <!-- Liste déroulante CIBLES -->
                        <!-- Pas la même nationalité que les agents -->
                        <div id="listeCibles" class="form-group">
                            <select class="custom-select my-1 mr-sm-2" id="nouvelleCible" name="nouvelleCible">
                                <?php
                                foreach ($listeCibles as $elem1): 
                                echo "<option value=\"".$elem1[0]."\">".$elem1[1]."</option>";
                                endforeach;              
                                ?>  
                            </select>
                        </div>

                        <!-- Valeurs cachées -->
                        <input type="hidden" name="id" id="id" value="<?= $mission->getId() ?>">
                        <input type="hidden" name="action" id="action" value="update">
                        <input type="hidden" name="page" id="page" value="missions" >
                        <input type="hidden" name="module" id="module" value="cible" >

                        <button type="submit" class="btn rounded lesboutons" id="btn-ajout-cible" onclick=displayAddCible()>
                            <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                        </button>
                    </form>


                </div>

            </div>

        <?php 
        // FIN du IF CIBLES
        endif; ?>
