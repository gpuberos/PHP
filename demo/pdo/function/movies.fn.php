<?php

function findAllMovies($db)
{
    // On écrit la requête SQL pour sélectionner toutes les informations des films dans la base de données :
    $sql = "SELECT * FROM `movies`;";

    // On exécute la requête SQL sur la base de données avec la méthode query :
    // Query() est une méthode de PDO qui prépare et exécute une requête SQL
    // https://www.php.net/manual/fr/pdo.query
    // Ca retourne un objet $sql (qui contient la requête SQL SELECT) qui est un objet PDOStatement
    $request = $db->query($sql);

    // On récupère le résultat de la requête SQL et on la stocke dans un tableau associatif contenant toutes les informations de tous les films :
    $movies = $request->fetchAll();

    return $movies;
}

function findMovieById($db, $currentId)
{
    // Récupère l’identifiant du film à partir de l’URL de la page.
    $currentId = $_GET['id'];

    // Requête SQL pour sélectionner les informations du film dans la base de données pour un seul film.
    // Sélectionne les colonnes de la table movies qui contiennent les détails du film (titre, année de réalisation...)
    // On utilise la fonction GROUP_CONCAT pour regrouper les valeurs non Null d'un groupe en une chaîne de caractère dans notre cas les langues. SEPARATOR permet de modifier le séparateur (mettre un espace à la virgule) 
    // La clause WHERE spécifie le film que l'on souhaite sélectionner en utilisant son id, il sera récupéré via le $GET_ID dans notre URL et sera assigné à notre variable $currentId.
    $sql = "SELECT 
    m.id, 
    m.title, 
    m.rating, 
    m.year_released, 
    m.box_office, 
    m.budget,
    m.duration, 
    g.name AS genre,
    d.name AS director, 
    dc.name AS distributeur,
    GROUP_CONCAT(l.name SEPARATOR ', ') AS languages
    FROM `movies` AS m 
    INNER JOIN director d ON m.directorID = d.id 
    INNER JOIN distribution_company dc ON m.companyID = dc.id
    INNER JOIN genre g ON m.genreID = g.id
    INNER JOIN movie_language AS ml ON m.id = ml.movieID
    JOIN language AS l ON ml.languageID = l.id 
    WHERE m.id = $currentId";

    // Exécute la requête SQL sur la base de données
    $request = $db->query($sql);

    // Récupère le résultat de la requête SQL dans un tableau associatif contenant les informations du film.
    $movie = $request->fetch();

    // On retourne la valeur $movie
    return $movie;
}

function findPictureByMovie($db, $currentId)
{
    $sql = "SELECT * FROM `picture` WHERE movieId = $currentId";

    // Exécute la requête SQL sur la base de données
    $request = $db->query($sql);

    // Récupère le résultat de la requête SQL dans un tableau associatif contenant les informations du film.
    $picture = $request->fetch();

    // On retourne la valeur $movie
    return $picture;
}

function getStar($rating)
{

    $starRating = round($rating / 2, 1);
    $ratingInt = explode(".", $starRating);

    for ($i = 0; $i < $ratingInt[0]; $i++) {
        echo '<div class="bi-star-fill"></div>';
    }
    if ($ratingInt[1] != 0) {
        echo '<div class="bi-star-half"></div>';
    }
    if (5 - $starRating >= 1) {
        echo '<div class="bi-star"></div>';
    }
}