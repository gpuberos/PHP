<?php

    // Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
    require __DIR__ . ('/utilities/header.php');

    // Tu vas me chercher dans le header le require vers ('/function/movies.fn.php') qui contient la fonction pour afficher les films
    $movies = findAllMovies($db);

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