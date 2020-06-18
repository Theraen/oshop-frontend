<?php


namespace oShop\Controllers;

use oShop\Models\Brand;
use oShop\Models\Type;

class CoreController {

        /**
     * La fonction Show() prends en argument un "nom de page" à affiché et l'affiche.
     * Elle prend aussi un second argument $viewVars, optionnel, qui sont les données que peux afficher la vue.
     * cette fonction est copié collé ! boo
     * Un moyen d'éviter ça ? oui, mais on la pas encore vu
     */
    protected function show($viewName, $viewVars=[]) {
         
        global $router;
        
        $typeModel = new Type();

        $footerTypes = $typeModel->findAllForFooter();
        $viewVars['footerTypes'] = $footerTypes;

        $brandModel = new Brand();

        $footerBrand = $brandModel->findAllForFooter();
        $viewVars['footerBrand'] = $footerBrand;

        // Je met a disposition de tous mes template l'adresse "de base" de notre site
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];
        // $viewVars est disponible dans chaque fichier de vue
        require_once __DIR__.'/../Views/header.tpl.php';
        require_once __DIR__.'/../Views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../Views/footer.tpl.php';
    }

}