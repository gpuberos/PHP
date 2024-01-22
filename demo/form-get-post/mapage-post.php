<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méthode POST via formulaire</title>
</head>

<body>

    <h1>Ton prénom est
        <?php
        if (!empty($_POST['prenom'])) {
            echo $_POST['prenom'];
        } else {
            echo 'john doe';
        }
        ?>
        et ton email est <?= $_POST['mail']; ?>
    </h1>

    <?php
    var_dump($_POST);
    ?>

</body>

</html>