<?php 

    // Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML)
    require('./header.php'); 
    
    // Récupère l’identifiant du film à partir de l’URL de la page.
    $currentId = $_GET['id'];
    
    // Requête SQL pour sélectionner les informations du film dans la base de données pour un seul film.
    // Sélectionne les colonnes de la table movies qui contiennent les détails du film (titre, année de réalisation...)
    // La clause WHERE spécifie le film que l'on souhaite sélectionner en utilisant son id, il sera récupéré via le $GET_ID dans notre URL et sera assigné à notre variable $currentId.
    $sql = "SELECT 
    m.id, 
    m.title, 
    m.rating, 
    m.year_released, 
    m.box_office, 
    m.budget, 
    m.duration, 
    d.name AS director, 
    dc.name AS distributeur 
    FROM `movies` AS m 
    INNER JOIN director d ON m.directorID = d.id 
    INNER JOIN distribution_company dc ON m.companyID = dc.id 
    WHERE m.id = $currentId";
    
    // Exécute la requête SQL sur la base de données
    $request = $db->query($sql);

    // Récupère le résultat de la requête SQL dans un tableau association contenant les informations du film.
    $movie = $request->fetch();

?>

<h1>Détails du film</h1>

<!-- Affiche les informations du film. -->
<h2><?= $movie['title']; ?></h2>
<p>Année de réalisation : <?= $movie['year_released']; ?></p>
<p>Par : <?=  $movie['director']; ?></p>
<p>De : <?= $movie['distributeur']; ?></p>
<p>Note des spectateurs : <?= $movie['rating']; ?></p>
<p>Nombres d'entrées : <?=  $movie['box_office']; ?></p>
<p>Coût de production : <?=  $movie['budget']; ?></p>
<p>Durée : <?=  $movie['duration']; ?></p>

</body>
</html>