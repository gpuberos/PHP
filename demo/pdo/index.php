<?php

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
require('./header.php');

// On écrit la requête SQL pour sélectionner toutes les informations des films dans la base de données :
$sql = "SELECT * FROM `movies`;";

// On exécute la requête SQL sur la base de données avec la méthode query :
// Query() est une méthode de PDO qui prépare et exécute une requête SQL
// https://www.php.net/manual/fr/pdo.query
// Ca retourne un objet $sql (qui contient la requête SQL SELECT) qui est un objet PDOStatement
$request = $db->query($sql);

// On récupère le résultat de la requête SQL et on la stocke dans un tableau associatif contenant toutes les informations de tous les films :
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