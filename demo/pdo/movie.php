<?php

// Etape de connexion à une base de données
require_once __DIR__ . ('/config/config.php');

// Fonction qui retourne la connexion à notre base de données
require_once __DIR__ . ('/function/database.fn.php');

$db = getPDOlink($config);

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');
$movie = findMovieById($db, $_GET['id']);

// Si je n'ai pas d'id dans l'URL OU que $movie['id'] = NULL (vide)
if (!isset($_GET['id']) || empty($movie['id'])) {
    // On fait une redirection
    header("Location: /");
} else {
    // Stocke moi le nom du film
    $title = 'Détails du film : ' . $movie['title'];
}

// Version ternaire :
// !isset($_GET['id']) || empty($movie['id']) ? header("Location: /") : $title = 'Détails du film : ' . $movie['title'];

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML)
require_once __DIR__ . ('/utilities/header.php');

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