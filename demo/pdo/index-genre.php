<?php

// Etape de connexion à une base de données
require_once __DIR__ . ('/config/config.php');

// Fonction qui retourne la connexion à notre base de données
require_once __DIR__ . ('/function/database.fn.php');

$db = getPDOlink($config);

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');

// Fonction qu retourne tous les genres de la table movies
function findAllGenres($db)
{
    // Requête SQL pour sélectionner la colonne `genre` de la table `movies`
    $sql = "SELECT * FROM `genre`;";
    // Exécute la requête SQL
    $request = $db->query($sql);
    // Récupère tous les résultats de la requête sous forme de tableau associatif
    $genres = $request->fetchAll();
    // Retourne les résultats
    return $genres;
}

// Fonction pour récupérer tous les films d'un genre
function findAllMoviesByGenre($db, $genre)
{
    // Requête SQL pour sélectionner tous les films d'un genre 
    $sql = "SELECT * FROM `movies` INNER JOIN `genre` ON movies.genreID = genre.id WHERE genre.name = '$genre';";
    $request = $db->query($sql);
    $movies = $request->fetchAll();
    return $movies;
}

// Récupère tous les genres
$genres = findAllGenres($db);

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
require_once __DIR__ . ('/utilities/header.php');

?>

<div class="text-center my-4">
    <h1>Les films Utopia</h1>
</div>


<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">

        <!-- Boucle qui parcourt chaque chaque élément du tableau $genres -->
        <?php foreach ($genres as $genre) : ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header bg-black text-white">
                        <h2 class="card-title"><?= $genre['name']; ?></h2>
                    </div>
                    <div class="card-body">


                        <!-- Récupère tous les films de ce genre -->
                        <?php $movies = findAllMoviesByGenre($db, $genre['name']); ?>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($movies as $movie) : ?>
                                <li class="list-group-item">
                                    <a href="<?= $movie_page; ?>?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>