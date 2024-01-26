<?php

// Fonction qui retourne la class active dans liens actifs de la navbar
function isActive($page, $url)
{
    // La fonction strpos() cherche la présence de la chaîne $url dans la chaîne $page.
    // Si $url est trouvé dans $page, strpos() retourne la position du début de la première occurrence de $url.
    // Sinon, elle retourne FALSE.
    if (strpos($page, $url) !== FALSE) {
        // Si $url est trouvé dans $page, la fonction retourne 'active'.
        // Cela signifie que la classe 'active' est ajoutée à l'élément de navigation correspondant.
        return 'active text-uppercase';
    }
}
