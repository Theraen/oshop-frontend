<?php

// J'inclus le mécanisme d'import automatique de composer
// Concrétement, en incluant ce fichier je vais avoir accés à toutes les classes et fonctions
// de librairies que j'ai installé
require __DIR__ . '/../vendor/autoload.php';

/*
// On inclus les controllers
require_once __DIR__ . '/../app/controllers/CoreController.php';
require_once __DIR__ . '/../app/controllers/MainController.php';
require_once __DIR__ . '/../app/controllers/CatalogController.php';

// J'embarque mon modèle commun CoreModel dans l'application
require_once __DIR__ . '/../app/models/CoreModel.php';

// J'embarque mon modèle Product dans l'application
require_once __DIR__ . '/../app/models/Product.php';

// J'embarque mon modèle Category dans l'application
require_once __DIR__ . '/../app/models/Category.php';

// J'embarque mon modèle Brand dans l'application
require_once __DIR__ . '/../app/models/Brand.php';

// J'embarque mon modèle Type dans l'application
require_once __DIR__ . '/../app/models/Type.php';

// Je require la classe Database qui me servira à me connecter a la BDD
require_once __DIR__ . '/../app/utils/Database.php';
*/


// On liste les pages disponible sur notre site
// ça s'appel des routes
// $allPages = [
//     '/' => 'home',
//     '/category' => 'category'
// ];


// Je récuềre la page demandée par l'utilisateur
// if(!empty($_GET['_url'])) {
//     $pageToDisplay = $_GET['_url'];
// } else {
//     $pageToDisplay = '/';
// }


// if(isset($allPages[$pageToDisplay])) {
//     Je récupère le nom de la méthode à appeller dans une variable.
//     $methodToCall = $allPages[$pageToDisplay];
// } else {
//     $methodToCall = 'error404';
// }


// Je créé une instance de la classe AltoRouter mises à dispo par la librairie.
$router = new AltoRouter();

// On donne des infos a AltoRouter sur la structure de notre projet.
$router->setBasePath($_SERVER['BASE_URI']);

// Je créé une route
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/', // A quelle URL ma route va réagir
    [
        'controller' => 'MainController', // Controller à utiliser
        'method' => 'home' // méthode du controller à appeler
    ],
    'route_home' // Je donne un nom à ma route
);

// Je créé une seconde route pour afficher une catégorie
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/catalog/category/[i:idCategory]', // A quelle URL ma route va réagir
    [
        'controller' => 'CatalogController', // Controller à utiliser
        'method' => 'category' // méthode du controller à appeler
    ],
    'route_category' // Je donne un nom à ma route
);

// Je créé une route pour afficher les mentions légales
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/legal-mentions', // A quelle URL ma route va réagir
    [
        'controller' => 'MainController', // Controller à utiliser
        'method' => 'legalMentions' // méthode du controller à appeler
    ],
    'route_legal_mentions' // Je donne un nom à ma route
);

// Je créé une route pour afficher un type de produit
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/catalog/type/[i:idType]', // A quelle URL ma route va réagir
    [
        'controller' => 'CatalogController', // Controller à utiliser
        'method' => 'type' // méthode du controller à appeler
    ],
    'route_type' // Je donne un nom à ma route
);

// Je créé une route pour afficher une marque en particulier
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/catalog/brand/[i:idBrand]', // A quelle URL ma route va réagir
    [
        'controller' => 'CatalogController', // Controller à utiliser
        'method' => 'brand' // méthode du controller à appeler
    ],
    'route_brand' // Je donne un nom à ma route
);

// Je créé une route pour afficher le detail d'un produit
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/catalog/product/[i:idProduct]', // A quelle URL ma route va réagir
    [
        'controller' => 'CatalogController', // Controller à utiliser
        'method' => 'product' // méthode du controller à appeler
    ],
    'route_product' // Je donne un nom à ma route
);

// Je créé une route de test
$router->map( 
    'GET', // Je spécifie le type de requete que je veux écouter
    '/test', // A quelle URL ma route va réagir
    [
        'controller' => 'MainController', // Controller à utiliser
        'method' => 'test' // méthode du controller à appeler
    ],
    'route_test' // Je donne un nom à ma route
);





// On demande à notre router de vérifier que l'URL dans la barre d'adresse du navigateur
// correspond bien à une des url que notre application gère.
$match = $router->match();


if($match) {
    // La variable $match  contient toutes les infos
    // sur la route actuellement utilisé, nottement la cible, c'est à dire quelle méthode
    // de controler je doit appeler.
    // Le tableau match est construit par AltoRouter
    // Il contient 3 entrées :
    //* - Le nom de la route 'name
    //* - La cible 'target'
    //* - Les paramètres extraits de l'URL 'params'
    $params = $match['params'];
    $methodToCall = $match['target']['method'];
    $controllerToInstanciate = 'oShop\Controllers\\'.$match['target']['controller'];
} else {
    $params = [];
    // Si le router ne match sur aucune route existante on appelera la page 404
    $methodToCall = 'error404';
    $controllerToInstanciate = 'oShop\Controllers\MainController';
}


// j'instancie mon controller
// Je créer un objet à partir de ma class MainController
// Puis je le stock dans une variable $controller
$controller = new $controllerToInstanciate();



// imaginons que $methodToCall === 'store'
// La migne en dessous serais équivalente à taper $controller->store();
$controller->$methodToCall($params);