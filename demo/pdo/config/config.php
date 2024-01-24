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
$movie_page = $domain . 'datasheet.php';

// Correspond au nom du script, tout ce qui a après le nom de domaine c'est le script name
$current_url = $_SERVER['SCRIPT_NAME'];
