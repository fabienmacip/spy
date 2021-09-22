<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
<header>
    <h1>Spy Manager</h1>
</header>
<section>
    <nav>
        <ul>
            <!--<li><a href="index.php">Accueil</a></li>-->
            <li><a href="index.php?page=missions">Accueil</a></li>
			<li><a href="index.php?page=payss">Liste des pays</a></li>
            <li><a href="index.php?page=specialites">Liste des sp&eacute;cialit&eacute;s</a></li>
            <li><a href="index.php?page=typemissions">Liste des types de missions</a></li>
            <li><a href="index.php?page=administrateurs">Liste des administrateurs</a></li>
            <li><a href="index.php?page=planques">Liste des planques</a></li>
            <li><a href="index.php?page=personnes">Liste des personnes</a></li>
            <li><a href="index.php?page=missions">Liste des missions</a></li>
        </ul>
    </nav>
    <?= $contenu ?>
</section>
</main>
<footer class="fw-light fst-italic fs-6 text-center mt-4">
    <p>Spy - Tous droits réservés</p>
</footer>
</body>
</html>