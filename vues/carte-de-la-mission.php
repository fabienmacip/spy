<div class="card w-75 mx-auto text-center border-0">
        <div class="card-body">
            <h5 class="card-title">
                MISSION : <?= $mission->getTitre() ?>
            </h5>
            <p class="card-text text-start">
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
