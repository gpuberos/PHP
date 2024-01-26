<?php

// Etape de connexion à une base de données
require_once __DIR__ . ('/config/config.php');

// Fonction qui retourne la connexion à notre base de données
require_once __DIR__ . ('/function/database.fn.php');

$db = getPDOlink($config);

// Fonctions pour afficher la totalité des films ou un film par id
require_once __DIR__ . ('/function/movies.fn.php');

// Récupère tous les genres
$genres = findAllGenres($db);

// Inclut le contenu du fichier header.php (notre connexion bdd et en-tête HTML) :
require_once __DIR__ . ('/utilities/header.php');

?>

<div class="py-5">
    <div class="text-center my-4">
        <h1>Les films Utopia</h1>
    </div>

    <?php require_once __DIR__ . ('/utilities/cardGenre.php'); ?>

</div>

<?php require_once __DIR__ . ('/utilities/footer.php'); ?>

</body>

</html>