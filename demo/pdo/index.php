<?php

// Etape de connexion à une base de données
require_once __DIR__ . ('/config/config.php');

// Fonction qui retourne la connexion à notre base de données
require_once __DIR__ . ('/function/database.fn.php');

$db = getPDOlink($config);

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');

$movies = findAllMovies($db);

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
require_once __DIR__ . ('/utilities/header.php');

?>

<h1>Les films Utopia</h1>

<!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->
<ul>
    <?php foreach ($movies as $movie) : ?>
        <li>
            <a href="<?= $movie_page; ?>?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>

</body>

</html>