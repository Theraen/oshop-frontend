# Autoloeading

## Mise en place

Désormais chaque fichier de mon projet est dans un Namespace Logique

En effet le Namespace reprend ler chemin physique du fichier.

Du coup si par exemple, je cherche la classe dont le FQCN est : 
`oShop\Controllers\CoreController`
Il est possible de deviner que le chemin physique du fichier contenant la déclaration de la classe sera:
`app/Controllers\CoreController.php`

## Principe de fonctionnement

Puisque nos nom de classes ont une correspondance avec l'emplacement des fichiers.

Lorsque PHP va remarquer qu'on appel une classe qu'il ne connait pas, il va pouvoir, de part l'analyse du FQCN de la classe, déterminé le fichier à require automatiquement.

Ex:

```php

new oShop\Models\Brand()

```

Là PHP se dit `Oh mince, je ne connais pas cette classe ... Et si je cherchais à require le fichier qui correspond ?`

```php

// Automatiquement php fait la conversion FQCN / chemin physique
// et réalise quelque chose comme:
require 'app/Models/Brand.php'
```

## Mise en place avec PHP en natif 

ça ce passe ici :

et c'est un peu relou ...

## Mise en pace avec Composer

Ajouter dans le composer.json les indication suivante :

```json

 "autoload": {
        "psr-4": {"oShop\\": "app/"}
    }
```

Puis executer `composer update` afin que Composer prennent en compte NOS fichier dans l'autoload.
