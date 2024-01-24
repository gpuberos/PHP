## Notes à compléter avec explications ...

Ce qu'il faut retenir pour la connexion à la BDD :
1. On défini nos variables d'environnement
2. DSN de connexion (Data Server Name)
3. On tente de se connecter à la base de données

## Fonction GROUP_CONCAT (Concaténation)
  
Pour chaque film, on concatène tous les noms de langues associés.  
  
`GROUP_CONTACT` est une fonction d'aggrégation permet de regrouper plusieurs resultats pour language sont bien associé au résultat de film, ça va les regrouper.  
  
```sql
-- Pour chaque film, on concatène tous les noms de langues associés en utilisant la fonction GROUP_CONCAT
-- les name(nom des langues) de la table language
-- SEPARATOR sert uniquement à modifier le séparateur dans notre cas on met une virgule suivi d'un espace
GROUP_CONCAT(l.name SEPARATOR ', ') AS languages

-- On joint la table movie_language (alias ml) à notre table movies.
-- On garde que les lignes où l’id du film dans la table movies correspond à l’id du film dans la table movie_language
INNER JOIN movie_language AS ml ON m.id = ml.movieID

-- On joint la table language (alias l) à notre table jointe précédente. 
-- On garde que les lignes où l’id de la langue dans la table movie_language correspond à l’id de la langue dans la table language
JOIN language AS l ON ml.languageID = l.id 

```
  
**Source :**  
- https://sql.sh/fonctions/group_concat
  
### Opération de jointure
  
**Explication simplifié d'une jointure :**  
  
- **INNER JOIN** : Imaginez deux sacs de billes, un sac représente une table et chaque bille dans le sac est une ligne de cette table. Maintenant, disons que vous voulez trouver toutes les billes qui sont à la fois dans le premier sac et dans le deuxième sac. C’est ce que fait `INNER JOIN` - il ne garde que les billes (lignes) qui apparaissent dans les deux sacs (tables).
- **ON** : Maintenant, comment déterminez-vous si une bille est dans les deux sacs ? Vous avez besoin d’une règle pour cela. Par exemple, la règle pourrait être que la couleur de la bille doit être la même. Dans SQL, cette règle est spécifiée après le mot-clé `ON`. Donc, `ON` est utilisé pour définir la condition qui détermine quelles lignes sont conservées après la jointure.
  
#### Dans notre exemple film Utopia
  
1. **FROM movies AS m** : on indique que la table movies est la table principale pour cette requête. AS m signifie que nous allons référer à la table movies en utilisant l’alias m pour le reste de la requête.
2. **INNER JOIN movie_language AS ml ON m.id = ml.movieID** : on effectue une jointure interne entre la table movies et la table movie_language. La jointure interne renvoie les lignes lorsque la condition de jointure est vraie. Ici, la condition de jointure est que l’id de la table movies doit être égal au movieID de la table movie_language. AS ml signifie que nous allons référer à la table movie_language en utilisant l’alias ml.
3. **JOIN language AS l ON ml.languageID = l.id** : on effectue une autre jointure (par défaut, c’est une jointure interne) entre le résultat de la jointure précédente et la table language. La condition de jointure est que le languageID de la table movie_language doit être égal à l’id de la table language. AS l signifie que nous allons référer à la table language en utilisant l’alias l.
  
**Résumé :**  
  
Depuis `movies` 
On fait un `INNER JOIN` sur la table intermédiaire `movie_language` qu'on relie à la table `movies` en utilisant leur `id`, donc `movies`.`id` (PRIMARY KEY)  = `movie_language`.`movieID` (FOREIGN KEY). 
On fait un `JOIN` pour relier la table `language` à la table intermédiaire `movie_language` en utilisant leur `id`, donc `movie_language`.`languageID` (FOREIGN KEY) = `language`.`id` (PRIMARY KEY).
  
**On suit ce cheminement :**  
  
Depuis la table `movies`, champ `movies.id` => on va à la table intermédiaire `movies_languages`, du champ `movies_languages.movieID` on va au champ `movies_languages.languageID` => puis on va à la table `language` dans le champ `language.id`.

### Arborescence répertoire
  
- bdd : on stocke export sql
- config : on stocke les fichiers configurations ex: info de connexion 
- function : on stocke toutes les fonctions php
- utilities : on stocke tous les composants (header.php, footer.php)

### Fonction

Une fonction s'écrit comme ça : (paramètre entre parenthèse).
```php
function mafonction($parametres) {
    
}
```

**Bonne pratique :**  

Ajouter .fn pour dire que c'est un fichier fonction
database.fn.php

On prefere array tableau pour stocker la config. 

Une fonction doit retourner quelque chose
On retourne $db

### Constantes magiques

On utilise les constantes magiques pour éviter les problématiques sur les chemins relatif sur d'autres serveurs. 

On va se servir des `__DIR__` et dirname pour se déplacer dans les répertoires (chemin relatif).

`dirname(__DIR__)` permet de revenir en arrière
Il va rechercher le chemin
On met le dirname uniquement quand le fichier est dans un répertoire à la racine du site on mettra uniquement `__DIR__`

Pour échapper un caractère il met 2 `\\`. 

https://www.php.net/manual/fr/language.constants.magic.php


**Variables Globales sont globalement déjà incluse dans PHP :**

```php
$_SERVER['DOCUMENT_ROOT'];
```
  
`'DOCUMENT_ROOT'` :  
La racine sous laquelle le script courant est exécuté, comme défini dans la configuration du serveur.

`PATH_INFO` :  
Contient les informations sur le nom du chemin fourni par le client concernant le nom du fichier exécutant le script courant, sans la chaîne relative à la requête si elle existe. Actuellement, si le script courant est exécuté via l'URI http://www.example.com/php/path_info.php/some/stuff?foo=bar, alors la variable `$_SERVER['PATH_INFO']` contiendra `/some/stuff`.

`ORIG_PATH_INFO` :  
Version originale de 'PATH_INFO' avant d'être analysée par PHP.

- https://www.php.net/manual/fr/reserved.variables.server.php
- https://stackoverflow.com/questions/14823495/wamp-showing-absolute-path-when-echoing-dirname-file


## Information annexe :
  
**Note à compléter**
  
Mettre le menu à droite dans bootstrap
<ul class="col-12 justify-content-end">
  
**Explication** des niveaux dans les Briefs :
- Niveau 1 : immiter
- Niveau 2 : adapter
- Niveau 3 : transposer