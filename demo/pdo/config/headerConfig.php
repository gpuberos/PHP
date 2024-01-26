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
