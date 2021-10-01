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
                        // Affiche des détails des contacts
                        foreach ($contacts as $contact): ?>
                        <div id="unContact<?= $contact->getId() ?>" class="sous-carte p-1 my-1 rounded border border-success">
                            <h6 class="card-subtitle my-1">
                            <?= $contact->getPrenom() ?> <?= strtoupper($contact->getNom()) ?>
                            <button class="btn rounded lesboutons" onclick=confirmeDeleteContact()>
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
                    <button class="btn rounded lesboutons" onclick=displayAddContact()>
                        <img src="./img/ajouter.png" class="img-petit img-ajouter" alt="ajouter"/>
                    </button>
                
                </div>
            </div>
 
        <?php 
        // FIN du IF CONTACTS
        endif; ?>

