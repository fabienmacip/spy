<!-- Liste des CONTACTS -->
<?php 
        if (is_null($contacts)):
        ?>
        <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Contacts
                    </h5>
                </div>    
            </div>
        <div>
        <?php else: ?>
            <div class="card w-25 border-info mx-auto">
                <div class="card-body text-center">
                    <h5 class="card-title">
                        Contacts
                    </h5>

                    <?php 
                        // Affiche des détails des contacts
                        foreach ($contacts as $contact): ?>

                    <h6 class="card-subtitle">
                    <?= $contact->getPrenom() ?> <?= strtoupper($contact->getNom()) ?>
                    </h6>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $contact->getDob() ?></span></li>
                        <li class="list-group-item">Code secret : <span class="text-secondary"><?= $contact->getSecretCode() ?></span></li>
                        <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $contact->getNationalite() ?></span></li>
                    </ul>

                    <?php endforeach; ?>

                </div>    
            </div>
        <div>

        <?php 
        // FIN du IF CONTACTS
        endif; ?>

