<?php
$titre = 'Une mission';
if (is_null($mission)):
    $contenu = "Cette mission n'existe pas.";
else:
    ob_start();
?>

<div class="card w-75 mx-auto text-center border-0">
  <div class="card-body">
    <h5 class="card-title">
      MISSION : <?= $mission->getTitre() ?>
    </h5>
    <div class="text-end">
      <button type="button" 
              class="btn-primary" 
              onclick=confirmeSuppressionMission(<?php echo $mission->getId().",'".str_replace(" ","&nbsp;",$mission->getTitre())."','".str_replace(" ","&nbsp;",$mission->getNomDeCode())."'" ?>)>
        Supprimer
      </button>  
    </div>
    <p class="card-text text-start">
      Description<br/><i><?= $mission->getDescription() ?></i>
    </p>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-3">
        <?php
            // DETAILS de la MISSION
            require_once('carte-de-la-mission.php');
        ?>
    </div>
    <div class="col-3">
        <?php
            // CIBLES
            require_once('carte-des-cibles.php');
        ?>
    </div>
    <div class="col-3">
        <?php
            // CONTACTS
            require_once('carte-des-contacts.php');
        ?>
    </div>
    <div class="col-3">
        <?php
            // AGENTS
            require_once('carte-des-agents.php');
        ?>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-3">
        <?php
            // PLANQUES
            require_once('carte-des-planques.php');
        ?>
    </div>
  </div>
</div>
<?php
    $contenu = ob_get_clean();
// FIN du IF MISSION
endif;

require_once('layout.php');

