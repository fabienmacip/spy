    <div class="card w-100 border-info mx-auto" id="carte-mission">
        <div class="card-header text-center">
            <h5 class="card-title">
                Donn&eacute;es g&eacute;n&eacute;rales
            </h5>
            <h6 class="class-subtitle">
            <?= $mission->getId() ?> - <?= $mission->getNomDeCode() ?>
            </h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item">Pays : <span class="text-secondary"><?= $mission->getPays() ?></span></li>
                <li class="list-group-item">Sp&eacute;cialit&eacute; : <span class="text-secondary"><?= $mission->getSpecialite() ?></span></li>
                <li class="list-group-item">Type mission : <span class="text-secondary"><?= $mission->getTypeDeMission() ?></span></li>
                <li class="list-group-item">Du <span class="text-secondary"><?= strftime("%a %d %b %G",strtotime($mission->getDateDebut())) ?></span></li>
                <li class="list-group-item">Au <span class="text-secondary"><?= strftime("%a %d %b %G",strtotime($mission->getDateFin())) ?></span></li>
                <li class="list-group-item">Statut : <span class="text-secondary"><?= $mission->getStatut() ?></span></li>
            </ul>
        </div>    
        <div class="card-footer text-center">
            <button class="btn rounded lesboutons" onclick=displayUpdateMission()>
                <img src="./img/modifier.png" class="img-petit img-modifier" alt="modifier"/>
            </button>
        </div>
    </div>
