<?php 

    require('./header.php'); 
    
    $currentId = $_GET['id'];
    
    $sql = "SELECT m.id, m.title, m.rating, m.year_released, m.box_office, m.budget, m.duration, d.name AS director, dc.name AS distributeur FROM `movies` AS m INNER JOIN director d ON m.directorID = d.id INNER JOIN distribution_company dc ON m.companyID = dc.id WHERE m.id = " . $currentId;
    
    $request = $db->query($sql);
    $movies = $request->fetch();

?>

<h1>Détails du film</h1>
<?php foreach ($movies as $movie): ?>
    <h2><?= $movie['title']; ?></h2>
    <p>Année de réalisation : <?= $movie['year_released']; ?></p>
    <p>Par : <?=  $movie['director']; ?></p>
    <p>De : <?= $movie['distributeur']; ?></p>
    <p>Note des spectateurs : <?= $movie['rating']; ?></p>
    <p>Nombres d'entrées : <?=  $movie['box_office']; ?></p>
    <p>Coût de production : <?=  $movie['budget']; ?></p>
    <p>Durée : <?=  $movie['duration']; ?></p>
<?php endforeach; ?>


</body>
</html>