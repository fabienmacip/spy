<?php
$listePays = new Payss($pdo);
$listeSpecialites = new Specialites($pdo);
$listeTypeMissions = new TypeMissions($pdo);
//$listePlanques = new Planques();
$listePersonnes = new Personnes($pdo);
$listeAgents = [];
$listeAgents = $mission->listerAgents($mission->getId());
$listeCibles = [];
$listeCibles = $mission->listerCibles($mission->getId());
$listeContacts = [];
$listeContacts = $mission->listerContacts($mission->getId());
$listePlanques = [];
$listePlanques = $mission->listerPlanques($mission->getId());

$scriptMission = "<script src=\"./script/script-mission.js\"></script>";

$titre = 'Une mission';
if (is_null($mission)):
    $contenu = "Cette mission n'existe pas.";
else:
    ob_start();
?>

<?php
  if(isset($missionToUpdate)) {?>
  <div class="mission-updated"><?= $missionToUpdate ?></div>
  <?php
  }
?>

<div class="card w-100 w-75 mx-auto px-1 px-lg-4 px-xl-5 text-center border-0">
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
  <div class="row">
  <div class="col-0 col-lg-1"></div>
    <div class="col-12 col-lg-10">
      <p class="card-text text-start">
        Description<br/><i><?= $mission->getDescription() ?></i>
      </p>
    </div>
    <div class="col-0 col-lg-1"></div>
  </div>
  </div>
</div>

<?php 
$classesDesCols = "col-12 col-md-6 col-lg-3 mb-3";
?>
<div class="container">
  <div class="row">
    <div class="<?= $classesDesCols ?>">
        <?php
            // DETAILS de la MISSION
            require_once('form-update-mission.php');
            require_once('carte-de-la-mission.php');

            // PLANQUES
            require_once('carte-des-planques.php');
        ?>

    </div>
    <div class="<?= $classesDesCols ?>">
        <?php
            // CIBLES
            require_once('carte-des-cibles.php');
        ?>
    </div>
    <div class="<?= $classesDesCols ?>">
        <?php
            // CONTACTS
            require_once('carte-des-contacts.php');
        ?>
    </div>
    <div class="<?= $classesDesCols ?>">
        <?php
            // AGENTS
            require_once('carte-des-agents.php');
        ?>
    </div>
  </div>
</div>
<?php
    $contenu = ob_get_clean();
// FIN du IF MISSION
endif;

require_once('layout.php');

