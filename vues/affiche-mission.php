<?php
$titre = 'Une mission';
if (is_null($mission)):
    $contenu = "Cette mission n'existe pas.";
else:
    ob_start();
?>
<!-- Détails MISSION -->
    <div class="card w-100 mx-auto">
        <div class="card-body">
            <h5 class="card-title">
                MISSION : <?= $mission->getTitre() ?>
            </h5>
            <p class="card-text">
            Description<br/><i><?= $mission->getDescription() ?></i>
            </p>
        </div>

    </div>

    <div class="card w-25 border-info mx-auto">
        <div class="card-body text-center">
            <h5 class="card-title">
                Donn&eacute;es g&eacute;n&eacute;rales
            </h5>
            <h6 class="class-subtitle">
            <?= $mission->getId() ?> - <?= $mission->getNomDeCode() ?>
            </h6>
            
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item">Pays : <span class="text-secondary"><?= $mission->getPays() ?></span></li>
                <li class="list-group-item">Sp&eacute;cialit&eacute; : <span class="text-secondary"><?= $mission->getSpecialite() ?></span></li>
                <li class="list-group-item">Type mission : <span class="text-secondary"><?= $mission->getTypeDeMission() ?></span></li>
                <li class="list-group-item">Du <span class="text-secondary"><?= strftime("%a %d %b %G",strtotime($mission->getDateDebut())) ?></span></li>
                <li class="list-group-item">Au <span class="text-secondary"><?= strftime("%a %d %b %G",strtotime($mission->getDateFin())) ?></span></li>
                <li class="list-group-item">Statut : <span class="text-secondary"><?= $mission->getStatut() ?></span></li>
            </ul>
        </div>    
    </div>

    <?php
    //$contenu = ob_get_clean();
//endif;
?>
<!-- #####################  DEBUT PLANQUE ########################## -->
        <!-- Liste des PLANQUES -->
        <?php 
        if (is_null($planque)):
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
                    <h6 class="card-subtitle">
                    <?= $planque->getCode() ?>
                    </h6>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">Adresse : <span class="text-secondary"><?= $planque->getAdresse() ?></span></li>
                        <li class="list-group-item">Ville : <span class="text-secondary"><?= $planque->getVille() ?></span></li>
                        <li class="list-group-item">Pays : <span class="text-secondary"><?= $planque->getPays() ?></span></li>
                    </ul>
                </div>    
            </div>
        <div>



        <?php 
        // FIN du IF PLANQUE
        endif; ?>

<!-- *********************  FIN PLANQUE *********************** -->

<!-- #####################  DEBUT CIBLE ########################## -->
        <!-- Liste des CIBLES -->
        <?php 
        if (is_null($cible)):
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
                    <h6 class="card-subtitle">
                    <?= $cible->getPrenom() ?> <?= strtoupper($cible->getNom()) ?>
                    </h6>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item">N&eacute;(e) le : <span class="text-secondary"><?= $cible->getDob() ?></span></li>
                        <li class="list-group-item">Code secret : <span class="text-secondary"><?= $cible->getSecretCode() ?></span></li>
                        <li class="list-group-item">Nationalit&eacute; : <span class="text-secondary"><?= $cible->getNationalite() ?></span></li>
                    </ul>
                </div>    
            </div>
        <div>



        <?php 
        // FIN du IF CIBLE
        endif; ?>

<!-- *********************  FIN CIBLE *********************** -->


<!-- Bouton RETOUR à la liste des MISSIONS -->
<div class="text-center">
        <a href="index.php?page=missions" class="btn btn-primary mt-3">Retour à la liste des missions</a>
</div>

<?php


    $contenu = ob_get_clean();
// FIN du IF MISSION
endif;

require_once('layout.php');

