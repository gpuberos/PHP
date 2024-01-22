# PHP

## TRY CATCH

`try` et `catch` sont utilisés pour gérer les exceptions, c’est-à-dire les erreurs inattendues qui peuvent survenir lors de l’exécution d’un programme. 

**Fonctionnement en PHP :**

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