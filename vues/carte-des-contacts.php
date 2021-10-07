<!-- Liste des CONTACTS -->
<?php 
        if (is_null($contacts)):
        ?>
        <div class="card w-100 border-info mx-auto">
            <div class="card-body text-center">
                <h5 class="card-title">
                    Contacts
                </h5>
            </div>    
         </div>
        <?php else: ?>
            <div class="card w-100 border-info mx-auto">
                <div class="card-header text-center">
                    <h5 class="card-title">
                        Contacts
                    </h5>
                </div>
                <div class="card-body">
                    <?php 
                        // Vérification à priori de la possibilité de supprimer un contact
                        // Il faut au moins 1 contact par mission
                        if(count($contacts) > 1) {
                            //$styleDelete = '';
                            $messageDelete = '';
                            $okPourDelete = 1;
                        } else {
                            //$styleDelete = ' disabled';
                            $okPourDelete = 0;
                            $messageDelete = 'Il faut au moins un contact dans une mission';
                        }

                        // Affiche des détails des contacts
                        foreach ($contacts as $contact): ?>
                        <div id="unContact<?= $contact->getId() ?>" class="sous-carte p-1 my-1 rounded border border-success">
                            <h6 class="card-subtitle my-1">
                            <?= $contact->getPrenom() ?> <?= strtoupper($contact->getNom()) ?>
                            <button class="btn rounded lesboutons" onclick=confirmeDeleteContact(<?php echo $contact->getId().",\"".$contact->getNom()."\",".$mission->getId().",".$okPourDelete ?>)>
                                <img src="./img/supprimer.png" class="img-petit img-supprimer" alt="supprimer"/>
                            </button>
                            </h6>

                            <ul class="list-group list-group-flush text-start">
                                <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $contact->getDob() ?></span></li>
                                <li class="list-group-item">Code secret : <span class="text-secondary"><?= $contact->getSecretCode() ?></span></li>
                                <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $contact->getNationalite() ?></span></li>
                            </ul>
                        </div>
                        <?php endforeach; ?>
                </div>
                <div class="card-footer text-center">
                
                <form method="post" action="mission.php" id="form-update-mission-contact" class="mt-3 bg-info">

                    <!-- Liste déroulante CONTACTS -->
                    <!-- Pas la même nationalité que les agents -->
                    <div id="listeContacts" class="form-group">
                        <select class="custom-select my-1 mr-sm-2" id="nouveauContact" name="nouveauContact">
                            <?php
                            foreach ($listeContacts as $elem1): 
                            echo "<option value=\"".$elem1[0]."\">".$elem1[1]."</option>";
                            endforeach;              
                            ?>  
                        </select>
                    </div>

                    <!-- Valeurs cachées -->
                    <input type="hidden" name="id" id="id" value="<?= $mission->getId() ?>">
                    <input type="hidden" name="action" id="action" value="update">
                    <input type="hidden" name="page" id="page" value="missions" >
                    <input type="hidden" name="module" id="module" value="contact" >

                    <button type="submit" id="btn-ajout-contact" class="btn rounded lesboutons" onclick=displayAddContact()>
                        <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                    </button>
                </form>




                </div>
            </div>
 
        <?php 
        // FIN du IF CONTACTS
        endif; ?>

