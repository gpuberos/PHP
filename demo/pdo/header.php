<?php

// Etape de connexion à une base de données

// 1 - On défini nos variables d'environnement :
$config = array(
    'dbhost' => 'localhost',
    'dbname' => 'dbmovie_utopia',
    'dbport' => '3306',
    'dbuser' => 'root',
    'dbpass' => ''
);

// 2 - DSN de connexion (Data Server Name) :
// Source : https://fr.wikipedia.org/wiki/Data_Source_Name
$dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';port=' . $config['dbport'];

// 3 - On tente de se connecter à la base de données :
try {
    // On instancie l'objet PDO :
    $db = new PDO($dsn, $config['dbuser'], $config['dbpass']);

    // On envoi nos requêtes en UTF-8 :
    $db->exec("SET NAMES utf8");

    // On définit le mode fetch par défaut 
    // (si on ne fait pas le FETCH_ASSOC on reçoit les clés en double, donc on a 2 fois les mêmes informations) :
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // On utilise l'objet PDOException 
    // On utilise une méthode getMessage() (une méthode est une fonction qui appartient à un objet)
    exit('BDD Erreur de connexion : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopia</title>
</head>

<body>