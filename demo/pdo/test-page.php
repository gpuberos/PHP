<?php

    // Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
    require_once __DIR__ . ('/utilities/header.php');

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');

$movies = findAllMovies($db);

// var_dump($movies);

?>

    <!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->
    <ul>
        <?php foreach ($movies as $movie) : ?>
            <li>
                <a href="<?= $movie_page; ?>?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

<h1><?= isset($title) ? $title : 'Titre par défaut'; ?></h1>

</body>

</html>