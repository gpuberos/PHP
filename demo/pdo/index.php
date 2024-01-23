<?php 

    require('./header.php');

    $sql = "SELECT * FROM `movies`;";

    $request = $db->query($sql);
    $movies = $request->fetchAll();

?>

<h1>Les films Utopia</h1>

<?php foreach($movies as $movie): ?>
    <a href="mapage.php?id=<?= $film['id'] ?>"><?= $film['title'] ?></a>
<?php endforeach; ?>


</body>

</html>