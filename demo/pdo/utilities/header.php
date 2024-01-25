<?php

// Domaine par défaut :
$domain = '/';

// Configuration des pages :
$index_page = $domain;
$movies_page = $domain . 'movies.php';
$movie_page = $domain . 'movie.php';
$contact_page = $domain . 'contact.php';

// Correspond au nom du fichier script, tout ce qui a après le nom de domaine c'est le script name
$current_url = $_SERVER['SCRIPT_NAME'];

// Titres des pages :
$index_name = 'Les films de la semaine';
$movies_name = 'Tous les films à l\'affiche';
$contact_name = 'Contactez-nous';

// strpos() est une fonction PHP qui trouve la position de la première occurrence d’une sous-chaîne dans une chaîne. 
// Si la sous-chaîne n’est pas trouvée, strpos() retourne FALSE
// Donc, Si l'URL actuelle contient soit $index_page soit $index_page . 'index.php'
if (strpos($index_page, $current_url) !== FALSE || strpos($index_page . 'index.php', $current_url) !== FALSE) :
    $title = $index_name;

// Sinon, si l'URL actuelle contient $movies_page
elseif (strpos($movies_page, $current_url) !== FALSE) :
    $title = $movies_name;

// Sinon, si l'URL actuelle contient $contact_page
elseif (strpos($contact_page, $current_url) !== FALSE) :
    $title = $contact_name;

endif;

// function isActive($page, $url) {
//     if (strpos($page, $url) !== FALSE) {
//         return 'active';
//     } else {
//         return '';
//     }
// }

// isActive($index_page, $current_url);

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
    <!-- <link rel="manifest" href="/assets/icons/site.webmanifest"> -->

    <!-- Bootstrap Librairies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Custom -->
    <!-- <link rel="stylesheet" href="/assets/css/styles.css"> -->

    <title>Utopia</title>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand align-item-center" href="<?= $index_page; ?>"> <img src="/assets/img/utopia-logo.webp" alt="Logo" width="67" height="24" class="d-inline-block">Cinéma Utopia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 col-12 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $index_page; ?>">Accueil</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $movies_page; ?>">Les films</a>
                        </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contact</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Tous les cinémas</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Formulaire de contact</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-black overflow-hidden" style="height: 500px;">
        <div class="container-fluid position-relative h-100">
            <img class="position-absolute top-50 start-50 translate-middle h-100" src="/assets/img/cinema-ban.jpg" alt="Image de background">
            <div class="position-absolute top-50 start-50 translate-middle align-items-center px-5 py-3 bg-dark bg-opacity-50 text-center text-white rounded-3">
                <h1 class="display-4 fw-bolder"><?= isset($title) ? $title : 'Mon titre par défaut'; ?></h1>
                <p class="lead mb-0 fw-normal text-white-75">Un film de <strong>...</strong></p>
            </div>
        </div>
    </header>