<?php
$titre = 'Une mission';
if (is_null($mission)):
    $contenu = "Cette mission n'existe pas.";
else:
    ob_start();

    // DETAILS de la MISSION
    require_once('carte-de-la-mission.php');

    // PLANQUES
    require_once('carte-des-planques.php');

    // CIBLES
    require_once('carte-des-cibles.php');

    // CONTACTS
    require_once('carte-des-contacts.php');

    // AGENTS
    require_once('carte-des-agents.php');
    ?>

<?php


    $contenu = ob_get_clean();
// FIN du IF MISSION
endif;

require_once('layout.php');

