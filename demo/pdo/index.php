<?php

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML)
require('./header.php');

// Requête SQL pour sélectionner toutes les informations des films dans la base de données.
$sql = "SELECT * FROM `movies`;";

// Exécute la requête SQL sur la base de données
$request = $db->query($sql);

// Récupère le résultat de la requête SQL. Un tableau associatif contenant toutes les informations de tous les films.
$movies = $request->fetchAll();

?>

<h1>Les films Utopia</h1>

<!-- Boucle qui parcourt chaque élément du tableau $movies et affiche un lien vers la page de détails pour chaque film. -->

<ul>
    <?php foreach ($movies as $movie) : ?>
        <li>
            <a href="datasheet.php?id=<?= $movie['id'] ?>"><?= $movie['title'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>

</body>

</html>