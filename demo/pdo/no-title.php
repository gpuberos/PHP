<?php

    // Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
    require __DIR__ . ('/utilities/header.php');

?>

<h1><?= isset($title) ? $title : 'Titre par défaut'; ?></h1>

</body>

</html>