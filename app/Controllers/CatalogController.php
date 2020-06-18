<?php

namespace oShop\Controllers;

use oShop\Models\Brand;
use oShop\Models\Category;
use oShop\Models\Product;
use oShop\Models\Type;

/**
 * Controller dédié au page qui gère le catalogue
 */
class CatalogController extends CoreController{

    /**
     * Affiche la page d'une categorie
     */
    public function category($params)
    {


        // Je veux récupérer toutes les infos de ma catégorie que je suis en train d'afficher.
        $categoryModel = new Category();

        // Je demande à mon modèle de trouver la bonne catégorie en lui envoyant un id.
        $category = $categoryModel->find($params['idCategory']);

        $productModel = new Product();
        $productList = $productModel->findAllFromCategory($category->getId());
        $nbProductInCategory = count($productList);
        $nbAllProduct = $productModel->findNbProduct();

        $typeModel = new Type();

        $this->show('category', [
            'category' => $category,
            'productList' => $productList,
            'type' => $typeModel,
            'nbProductInCategory'=> $nbProductInCategory,
            'nbAllProduct' => $nbAllProduct
        ]);
    }

    /**
     * Affiche la page d'un type
     */
    public function type($params)
    {

        $typeModel = new Type();

        // Je demande à mon modèle de trouver la bonne catégorie en lui envoyant un id.
        $type = $typeModel->find($params['idType']);

        $productModel = new Product();
        $productList = $productModel->findAllFromType($type->getId());
        $nbProductInType= count($productList);
        $nbAllProduct = $productModel->findNbProduct();

        $categoryModel = new Category();

        $this->show('type', [
            'type' => $type,
            'productList' => $productList,
            'category' => $categoryModel,
            'nbProductInType'=> $nbProductInType,
            'nbAllProduct' => $nbAllProduct
        ]);
    }

    /**
     * Affiche la page d'une marque
     */
    public function brand($params)
    {
        $brandModel = new Brand();

        // Je demande à mon modèle de trouver la bonne catégorie en lui envoyant un id.
        $brand = $brandModel->find($params['idBrand']);

        $productModel = new Product();
        $productList = $productModel->findAllFromBrand($brand->getId());
        $nbProductInBrand = count($productList);
        $nbAllProduct = $productModel->findNbProduct();

        $typeModel = new Type();

        $this->show('brand', [
            'brand' => $brand,
            'productList' => $productList,
            'type' => $typeModel,
            'nbProductInBrand'=> $nbProductInBrand,
            'nbAllProduct' => $nbAllProduct
        ]);
    }


    /**
     * Affiche la page d'un produit
     */
    public function product($params)
    {

        // J'instancie un modèle vide pour utiliser la fonction find
        $productModel = new Product();
        // J'utilise la fonction find() de mon modèle pour chercher un produit en base de données.
        $product = $productModel->find($params['idProduct']);

        $brandModel = new Brand();
        $brand = $brandModel->find($product->getBrandId());

        $categoryModel = new Category();
        $category = $categoryModel->find($product->getCategoryId());

        $this->show('product', [
            'product' => $product,
            'brand' => $brand,
            'category' => $category
        ]);
    }

}