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
            <li><a href="/">Accueil</a></li>
            <li><a href="?page=missions">Missions</a></li>
			<li><a href="?page=payss">Liste des pays</a></li>
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