<?php

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML)
require __DIR__ . ('/utilities/header.php');

?>

<h1>Détails du film</h1>

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