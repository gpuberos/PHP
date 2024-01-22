<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lien et Formulaire - Methode GET & POST</title>
</head>

<body>
    <h1>Les films Utopia</h1>

    
    <h2>Lien pour test methode GET à partir d'une URL</h2>
    <!-- Le GET commence par un ? &amp; pour échapper -->
    <a href="mapage-getlink.php?prenom=guy&amp;mail=john@doe.com">Click</a>

    
    <h2>Formulaire GET</h2>
    <form action="mapage-post.php" method="post">
        <input type="text" name="prenom" id="prenom">
        <input type="email" name="mail" id="mail">
        <input type="submit" value="Envoyer">
    </form>

    <h2>Formulaire POST</h2>
    <form action="mapage-post.php" method="post">
        <input type="text" name="prenom" id="prenom">
        <input type="email" name="mail" id="mail">
        <input type="submit" value="Envoyer">
    </form>

</body>

</html>