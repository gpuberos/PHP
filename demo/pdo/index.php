<?php

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
require_once __DIR__ . ('/utilities/header.php');

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');

$movies = findAllMovies($db);

?>

<div class="py-5">
    <div class="text-center my-4">
        <h1>Les films Utopia</h1>
    </div>

    <!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->
    <ul>
        <?php foreach ($movies as $movie) : ?>
            <li>
                <a href="<?= $movie_page; ?>?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php require_once __DIR__ . ('/utilities/footer.php'); ?>

</body>

</html>