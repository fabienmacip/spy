<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <!--<link href="./script/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="./style.css" rel="stylesheet">

    <!-- JQuery -->
    <!--<script src="./script/jquery-3.6.0.min.js"></script>-->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    
    <?php
    if(isset($scriptMission)) {
        echo $scriptMission;
    } else {?>
        <script src="./script/script.js"></script>
    <?php }
    ?>

</head>
<body>

<?php
    if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
        $isAdmin = 1;
    } else {
        $isAdmin = 0;
    }
?>
<input type="hidden" id=isAdmin value="<?= $isAdmin ?>">

<header>
    <h1 class="text-center my-2">Spy Manager</h1>
</header>
<section>
    <nav class="navbar navbar-light bg-light navbar-expand-lg" style="--bs-scroll-height: 10rem;">

      <div class="container-fluid">
            <ul class="navbar-nav navbar-nav-scroll">
                <li class="nav-item"><a href="index.php?page=missions" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="index.php?page=personnes" class="nav-link">Personnes</a></li>
                <li class="nav-item"><a href="index.php?page=specialites" class="nav-link">Sp&eacute;cialit&eacute;s</a></li>
                <li class="nav-item"><a href="index.php?page=payss" class="nav-link">Pays</a></li>
                <li class="nav-item"><a href="index.php?page=planques" class="nav-link">Planques</a></li>
                
                <?php 
                if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1) { ?>
                    <li class="nav-item"><a href="index.php?page=connexion" class="nav-link">Se connecter</a></li>
                <?php
                } else { ?>
                    <li class="nav-item"><a href="index.php?page=administrateurs" class="nav-link">Administrateurs</a></li>
                    <li class="nav-item"><a href="index.php?page=deconnexion" class="nav-link">D&eacute;connexion</a></li>
                <?php
                }
                ?>

            </ul>
      </div>
    </nav>
    <?= $contenu ?>
</section>
</main>
<footer class="fw-light fst-italic fs-6 text-center mt-4">
    <p>Spy - Tous droits réservés</p>
</footer>
</body>
</html>