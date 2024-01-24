<?php

// 1 - On défini nos variables d'environnement :
$config = array(
    'dbhost' => 'localhost',
    'dbname' => 'dbmovie_utopia',
    'dbport' => '3306',
    'dbuser' => 'root',
    'dbpass' => ''
);

// Domaine par défaut :
$domain = '/';

// Configuration des pages :
$index_page = $domain;
$movies_page = $domain . 'movies.php';
$contact_page = $domain . 'contact.php';

// Titres des pages :
$index_name = 'Les films de la semaine';
$movies_name = 'Tous les films à l\'affiche';
$contact_name = 'Contactez-nous';

// Correspond au nom du script, tout ce qui a après le nom de domaine c'est le script name
$current_url = $_SERVER['SCRIPT_NAME'];


// strpos() est une fonction PHP qui trouve la position de la première occurrence d’une sous-chaîne dans une chaîne. 
// Si la sous-chaîne n’est pas trouvée, strpos() retourne FALSE
// Donc, Si l'URL actuelle contient soit $index_page soit $index_page . 'index.php'
if (strpos($index_page, $current_url) !== FALSE || strpos($index_page . 'index.php', $current_url) !== FALSE) :
    // Alors on définit le titre de la page comme $index_name
    $title = $index_name;
// Sinon, si l'URL actuelle contient $movies_page
elseif (strpos($movies_page, $current_url) !== FALSE) :
    // Alors on définit le titre de la page comme $movies_name
    $title = $movies_name;
// Sinon, si l'URL actuelle contient $contact_page
elseif (strpos($contact_page, $current_url) !== FALSE) :
    // Alors on définit le titre de la page comme $contact_name
    $title = $contact_name;
endif;
