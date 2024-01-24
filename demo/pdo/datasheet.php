<?php

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML)
require __DIR__ . ('/utilities/header.php');

// Tu vas me chercher dans le dossier fonction la fonction pour afficher le film par id
require __DIR__ . ('/function/movies.fn.php');

$title = $movie['title'];

?>

<h1>Détails du film <?= $title ?></h1>

<!-- $db est récupérer dans header.php -->
<!-- On récupère le second paramètre via $_GET['id'] pour remplir le ($currentId) de la fonction -->
<?php $movie = findMovieById($db, $_GET['id']); ?>

<!-- Affiche les informations du film. -->
<h2><?= $movie['title']; ?></h2>
<p>Année de réalisation : <?= $movie['year_released']; ?></p>
<p>Par : <?= $movie['director']; ?></p>
<p>De : <?= $movie['distributeur']; ?></p>
<p>Note des spectateurs : <?= $movie['rating']; ?></p>
<p>Nombres d'entrées : <?= $movie['box_office']; ?></p>
<p>Coût de production : <?= $movie['budget']; ?></p>
<p>Langue(s) : <?= $movie['languages']; ?></p>
<p>Durée : <?= $movie['duration']; ?></p>

</body>

</html>