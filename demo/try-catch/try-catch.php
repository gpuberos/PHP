<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple TRY CATCH</title>
</head>

<body>
    <?php
        // Exemple 1 :
        // TRY CATCH - Essaye ou attrape il n'arrête pas l'execution du code
        // https://www.php.net/manual/fr/language.exceptions.php

        $mavar = 'ok';
        $th = 'error';

        try {
            echo $mavar;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
    ?>

    <?php
        // Exemple 2 : (A décommenter)
        // Methode getMessage qui va nous renvoyer l'exception
        // Pour chaque erreur il envoit un message

        // try {
        //     echo $mavar;
        // } catch (Exception $e) {
        //     echo 'Exception reçue : ',  $e->getMessage(), "\n";
        // }
    ?>

</body>

</html>