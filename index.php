<?php

require_once('controleurs/Controleur.php');
require_once('modeles/Modele.php');
require_once('modeles/Mission.php');
require_once('modeles/Missions.php');
require_once('modeles/Pays.php');
require_once('modeles/Payss.php');
$controleur = new Controleur();
if (isset($_GET['page']) && 'missions' === $_GET['page']) {
    $controleur->afficherMissions();
} elseif (isset($_GET['page']) && 'payss' === $_GET['page']) {
    $controleur->listerPayss();
} else {
    $controleur->afficherMissions();
}