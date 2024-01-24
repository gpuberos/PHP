<?php

    // Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
    require __DIR__ . ('/utilities/header.php');

    // Tu vas me chercher dans le dossier fonction la fonction pour afficher les films
    // require __DIR__ . ('/function/movies.fn.php');

?>

<h1>Les films Utopia</h1>

<!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->

<?php $movies = findAllMovies($db); ?>

<ul>
    <?php foreach ($movies as $movie) : ?>
        <li>
            <a href="datasheet.php?id=<?= $movie['id'] ?>"><?= $movie['title'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>

</body>

</html>