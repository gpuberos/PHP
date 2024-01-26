<?php

// Fonction qui retourne la class active dans liens actifs de la navbar
function isActive($page, $url)
{
    // La fonction strpos() cherche la présence de la chaîne $url dans la chaîne $page.
    // Si $url est trouvé dans $page, strpos() retourne la position du début de la première occurrence de $url.
    // Sinon, elle retourne FALSE.
    if (strpos($page, $url) !== FALSE) {
        // Si $url est trouvé dans $page, la fonction echo 'active' est exécutée.
        // Cela signifie que la classe 'active' est ajoutée à l'élément de navigation correspondant.
        echo 'active';
    } else {
        // Si $url n'est pas trouvé dans $page, la fonction echo '' est exécutée.
        // Cela signifie qu'aucune classe n'est ajoutée à l'élément de navigation.
        echo '';
    }
}
