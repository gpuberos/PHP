<?php

function isActive($page, $url) {
    if (strpos($page, $url) !== FALSE) {
        echo 'active';
    } else {
        echo '';
    }
}