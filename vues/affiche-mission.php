<?php
$titre = 'Une mission';
if (is_null($mission)):
    $contenu = "Cette mission n'existe pas.";
else:
    ob_start();
?>
    <div class="card w-50 border-info mx-auto">
        <div class="card-body">
            <h5 class="card-title">
                <?= $mission->getTitre() ?>
            </h5>
            <h6 class="class-subtitle">
            <?= $mission->getId() ?> - <?= $mission->getNomDeCode() ?>
            </h6>
            <p class="card-text"><?= $mission->getDescription() ?></p>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><?= $mission->getPays() ?></li>
                <li class="list-group-item"><?= $mission->getSpecialite() ?></li>
                <li class="list-group-item"><?= $mission->getTypeDeMission() ?></li>
                <li class="list-group-item"><?= strftime("%a %d %b %G",strtotime($mission->getDateDebut())) ?> -> <?= strftime("%a %d %b %G",strtotime($mission->getDateFin())) ?></li>
                <li class="list-group-item"><?= $mission->getStatut() ?></li>
            </ul>
        </div>    
    </div>
    <div class="text-center">
        <a href="index.php?page=missions" class="btn btn-primary mt-3">Retour à la liste des missions</a>
    </div>


<?php
    $contenu = ob_get_clean();
endif;
require_once('layout.php');