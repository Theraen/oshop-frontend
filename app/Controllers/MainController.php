<?php


namespace oShop\Controllers;

use oShop\Models\Type;
use oShop\Models\Category;

/**
 * Controllezr dédié au page statique
 */
class MainController extends CoreController{

    /**
     * Affiche la page d'accueil
     */
    public function home($params)
    {

        $categoryHome = new Category;
        $categoryHome6 = $categoryHome->findCategoryInHome6();
        $categoryHome4 = $categoryHome->findCategoryInHome4();
        
        $this->show('home', [
            'categoryHome6' => $categoryHome6,
            'categoryHome4' => $categoryHome4
        ]);
        
    }

        /**
     * Affiche la page des mentions legales
     */
    public function legalMentions($params)
    {
        $this->show('legalMentions');
    }

        /**
     * Affiche la page "Erreur 404"
     */
    public function error404($params)
    {
        $this->show('error404');
    }

    /**
     * Methode de test
     */
    public function test($params)
    {
        
        /*// J'instancie un modèle vide pour utiliser la fonction find
        $categoryModel = new Category();
        // J'utilise la fonction find() de mon modèle pour chercher un produit en base de données.
        $category = $categoryModel->findAll();*/

       /*// J'instancie un modèle vide pour utiliser la fonction find
        $BrandModel = new Brand();
        // J'utilise la fonction find() de mon modèle pour chercher un produit en base de données.
        $brand = $BrandModel->findAll();*/

        // J'instancie un modèle vide pour utiliser la fonction find
        $typeModel = new Type();
        // J'utilise la fonction find() de mon modèle pour chercher un produit en base de données.
        $type = $typeModel->find(2);

        $this->show('test', [
            'test' => $type
        ]);
    }


}