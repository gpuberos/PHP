<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méthode GET via formulaire</title>
</head>

<body>
    <h1>Ton prénom est
        <?php
        // isset a été transmis (is set)
        // SI la valeur prenom existe affiche moi le prenom SINON affiche john doe
            if (isset($_GET['prenom'])) {
                echo $_GET['prenom'];
            } else {
                echo 'john doe';
            }
            ?> 
            et ton email est <?= $_GET['mail']; ?>

        <?php
            var_dump($_GET);
        ?>
    </h1>
</body>

</html>