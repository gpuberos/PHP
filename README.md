# PHP

## TRY CATCH

`try` et `catch` sont utilisés pour gérer les exceptions, c’est-à-dire les erreurs inattendues qui peuvent survenir lors de l’exécution d’un programme. 

**Fonctionnement :**

- Le bloc `try` contient le code qui pourrait potentiellement générer une exception. Par exemple, cela pourrait être une opération qui dépend d’une ressource externe, comme la lecture d’un fichier ou une connexion à une base de données.
- Le bloc `catch` suit immédiatement le bloc **try** et définit comment réagir si une exception est levée dans le **try**. Vous pouvez spécifier le type d’exception à attraper et écrire du code pour gérer cette situation spécifique.

**Exemple :**
```php
try {
    // Code qui pourrait lever une exception
} catch (TypeException $ex) {
    // Code pour gérer l'exception
}
```
Si une exception de type `TypeException` est levée dans le bloc `try`, l’exécution du programme saute immédiatement au bloc `catch` correspondant. L’exception est passée à la variable `$ex`, que l'on peut utiliser dans le **catch** pour gérer l’exception.

**Sources :**
- https://www.php.net/manual/fr/language.exceptions.php
- https://www.phptutorial.net/php-oop/php-try-catch/
- https://www.w3schools.com/php/php_exception.asp

### Exemple 1

**[Voir le répertoire exemple](/demo/try-catch/)**

```php

$mavar = 'ok';
$th = 'error';

try {
    echo $mavar;
} catch (\Throwable $th) {
    echo $th;
}
```
**Explication :**  
`$mavar = 'ok';` : On déclare une variable **$mavar** et on lui attribue la valeur **ok**.

`$th = 'error';` : On déclare une variable **$th** et on lui attribue la valeur **error**.

`try { echo $mavar; }` : Le bloc **try** tente d’afficher la valeur de **$mavar**, qui est **ok**.

`catch (\Throwable $th) { echo $th; }` : Le bloc **catch** attrape une exception de type `\Throwable` *(classe de base pour toutes les exceptions en PHP)*. Si l'exception est levée dans le bloc **try**, le **catch** sera exécuté. Dans ce cas, il affiche la valeur de l’exception **$th**. Dans notre cas, comme il n’y a pas d’erreur dans le **try**, le **catch** ne sera pas exécuté.

> [!NOTE]
> \Throwable est une interface de base pour toutes les exceptions et erreurs. Toutes les classes d'exception intégrées (telles que \Exception et \Error) implémentent cette interface, ce qui signifie qu'elles héritent des propriétés et des méthodes définies dans l'interface.  
>   
> **Sources :** 
> - https://blog.eleven-labs.com/fr/php7-throwable-error-exception/
> - https://www.php.net/manual/fr/class.throwable.php


### Exemple 2

**[Voir le répertoire exemple](/demo/try-catch/)**

```php
$mavar = 'ok';

try {
    echo $mavar;
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}

```
**Explication :**  
  
- `try { echo $mavar; }` : Le bloc try contient une ligne de code qui tente d’afficher la valeur de $mavar. Si $mavar n’est pas défini, cela générera une erreur.
- `catch (Exception $e) { echo 'Exception reçue : ',  $e->getMessage(), "\n"; }` :  
Le **catch** attrape l'exception de type **Exception**. Si l'exception est levée dans le **try**, alors le catch sera exécuté. Dans notre cas, il affiche le message **Exception reçue :** suivi du message qui est obtenu en appelant la méthode **getMessage()** sur l’objet exception **$e**.

Donc, si `$mavar` n’est pas défini ça affichera : **Exception reçue : Undefined variable: mavar**.

**Sources :**
- https://www.php.net/manual/fr/exception.getmessage.php
- https://www.w3schools.com/php/ref_exception_getmessage.asp

## Méthodes GET et POST

Les méthodes GET et POST sont des méthodes HTTP utilisées pour envoyer des données à un serveur. En PHP, ces méthodes sont souvent utilisées pour envoyer des données à partir d’un formulaire HTML.

**[Voir le répertoire des exemples](/demo/form-get-post/)**

### Méthode GET

Les données envoyées par GET sont ajoutées à l’URL sous forme de paires clé-valeur séparées par des signes égaux `=`. Si plusieurs paramètres sont passés, ils sont séparés par une esperluette `&`.  
  
On peut accéder à ces valeurs en utilisant la variable superglobale `$_GET`.

##### Paramètre de requête d'URL
![Paramètre de requête d'URL](/assets/schemas/schema-URL-PARAM.svg)

#### Méthode GET via un lien hypertexte

Dans **index.php** lorsque l'utilisateur clic sur le lien `Click`, il transmet à la mapage-getlink.php les paramètres prenom et mail.

**index.php**
```html
<a href="mapage-getlink.php?prenom=john&amp;mail=john@doe.com">Click</a>
```
**mapage-getlink.php**
```php
<p>Ton prénom est <?= $_GET['prenom']; ?> et ton email est <?= $_GET['mail']; ?></p>
```

`$_GET['prenom']` et `$_GET['mail']` récupèrent respectivement les valeurs des paramètres **prenom** et **mail** dans l’URL.

Notre URL ressemble à http://monsite.com/index.php?prenom=john&amp;mail=john@doe.com, le code affichera : Ton prénom est john et ton email est john@doe.com.

> [!IMPORTANT]
> `&amp;` est utilisé pour séparer les paramètres prenom et mail dans l’URL. Lorsque le navigateur voit `&amp;`, il le traduit en **&** avant de l’envoyer au serveur. Il faut utiliser `&amp;` au lieu de **&** pour des raisons de conformité avec la norme HTML. Si vous utilisez directement **&** ça pourrait entraîner des erreurs d'interprétation.  
>   
> En HTML, certains caractères ont des rôles spécifiques. Par exemple, **&** débute une entité HTML, qui est une suite de caractères représentant un caractère spécial. Ainsi, `&lt;` correspond à < et `&gt;` à >. Ces entités permettent d’intégrer des caractères spéciaux dans le code HTML sans créer de confusion.  
>   
> **Source :** https://www.w3schools.com/html/html_entities.asp

#### Méthode GET via un formulaire

**index.php**
```html
<h2>Formulaire GET</h2>
<form action="mapage-get.php" method="get">
    <input type="text" name="prenom" id="prenom">
    <input type="email" name="mail" id="mail">
    <input type="submit" value="Envoyer">
</form>
```
**Explication :**  

- `action="mapage-get.php"` : L’attribut **action** spécifie où envoyer les données du formulaire lorsque le formulaire est soumis.
- `method="get"` : L’attribut **method** spécifie comment envoyer les données du formulaire.

> [!NOTE]
> Les données sont ajoutées à l'URL sous forme d'une suite de paires nom/valeur. À la fin de l'URL de l'adresse Web, il y a un point d'interrogation `?` suivi par les paires nom/valeur séparés par une esperluette `&`.

**Source :**
- https://developer.mozilla.org/fr/docs/Learn/Forms/Sending_and_retrieving_form_data


#### mapage-get.php

```php
if (isset($_GET['prenom'])) {
    echo $_GET['prenom'];
} else {
    echo 'john doe';
}

```
**Explication :** On vérifie si le paramètre **prenom** a été défini dans l’URL ou le formulaire HTML. Si c’est le cas, il affiche la valeur de **prenom**. Sinon, il affiche **john doe**.

> [!NOTE]
> La fonction `isset()` est utilisée pour vérifier si une variable est définie, c’est-à-dire qu’elle a été déclarée et n’est pas NULL.  
>   
> Source : https://www.php.net/manual/fr/function.isset

```php
<?= $_GET['mail']; ?>
```
**Explication :** On affiche la valeur du paramètre **mail** à partir de l’URL ou du formulaire HTML.

```php
var_dump($_GET);
```
**Explication :** Affiche toutes les variables GET disponibles et leurs valeurs.

### Méthode POST

Les données envoyées par POST sont transmises dans le corps de la requête HTTP, ce qui les rend invisibles dans l’URL. Elles peuvent être de n’importe quel type et de n’importe quelle taille, ce qui rend la méthode POST plus flexible que la méthode GET.  
  
On peut accéder à ces valeurs en utilisant la variable superglobale `$_GET`.  
  
> [!IMPORTANT]
> La méthode `POST` envoie les données sous forme de paquet de données séparé, ce qui la rend plus sûre pour l’envoi de données sensibles, comme les mots de passe.

**index.php**
```html
<h2>Formulaire POST</h2>
<form action="mapage-post.php" method="post">
    <input type="text" name="prenom" id="prenom">
    <input type="email" name="mail" id="mail">
    <input type="submit" value="Envoyer">
</form>
```
**Explication :**  

- `action="mapage-post.php"` : L’attribut **action** spécifie où envoyer les données du formulaire lorsque le formulaire est soumis.
- `method="post"` : L’attribut **method** spécifie comment envoyer les données du formulaire.

#### mapage-post.php
```php
if (!empty($_POST['prenom'])) {
    echo $_POST['prenom'];
} else {
    echo 'john doe';
}
```
**Explication :** On vérifie si le paramètre **prenom** a été défini et n'est pas vide dans le formulaire HTML. Si c’est le cas, il affiche la valeur de **prenom**. Sinon, il affiche **john doe**.

> [!NOTE]
> La fonction `!empty()` est utilisée pour vérifier si la variable n’est pas vide. Elle vérifie si la variable est définie. 
>    
> Source : https://www.php.net/manual/fr/function.empty.php