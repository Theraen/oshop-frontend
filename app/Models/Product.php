<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;


/**
 * Ma classe Product est un modèle représentant un produit.
 */
class Product extends CoreModel{

    /**
     * Description longue
     */
    private $description;
    /**
     * Chemin vers l'image du produit
     */
    private $picture;
    /**
     * Prix
     */
    private $price;
    /**
     * Note du produit
     */
    private $rate;
    /**
     * Statut du produit
     */
    private $status;
    /**
     * Date de création.
     */
    private $brand_id;
    /**
     * Id de la catégorie
     */
    private $category_id;
    /**
     * Id du type
     */
    private $type_id;

    /**
     * Fonction permettant de récupérer un produit
     * 
     * @param int $id
     */
    public function find($id) {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = 'SELECT * FROM product WHERE id = ' . $id . ';';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $product = $pdoStatement->fetchObject(self::class);

        return $product;
    }

        /**
     * Fonction permettant de récupérer un produit
     * 
     * @param int $id
     */
    public function findProduct($id) {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = 'SELECT * FROM product WHERE id = ' . $id . ';';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $product = $pdoStatement->fetchObject(self::class);

        return $product;
    }

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAll() {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = 'SELECT * FROM product;';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
}

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAllFromCategory($idCategory) {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = '
        SELECT *
        FROM product
        WHERE category_id = ' . $idCategory . ';';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
}

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAllFromType($idType) {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = '
        SELECT *
        FROM product
        WHERE type_id = ' . $idType . ';';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
}

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAllFromBrand($idBrand) {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = '
        SELECT *
        FROM product
        WHERE brand_id = ' . $idBrand . ';';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $products;
}

        /**
     * Fonction permettant de récupérer un produit
     * 
     * @param int $id
     */
    public function findNbProduct() {

        // Je vais faire mes requête SQL pour récuperer mon produit.

        // Pour pouvoir faire des requête SQL, je doit utiliser PDO.

        // Ma clase Databse me met PDO à disposition
        $pdo = Database::getPDO();

        // Seconde étape, rédiger la requête SQL
        $sql = 'SELECT count(*) AS nbProduct FROM product';

        // J'envoi ma requête au serveur SQL en ésperant une réponse.
        $pdoStatement = $pdo->query($sql);

        // Je récupère les données renvoyées par la base de données sous la forme d'un objet de type Product
        $nbProduct = $pdoStatement->fetch(PDO::FETCH_ASSOC);

        return $nbProduct;
    }


    

    /**
     * Get description longue
     * 
     * @return string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description longue
     * 
     * @param string $description
     *
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

    }

    /**
     * Get chemin vers l'image du produit
     * 
     * @return string
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set chemin vers l'image du produit
     * 
     * @param sring $picture
     *
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

    }

    /**
     * Get prix
     * 
     * @return float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set prix
     * 
     * @param float $price
     *
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

    }

    /**
     * Get note du produit
     * 
     * @return int
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set note du produit
     * 
     * @param int $rate
     *
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

    }

    /**
     * Get statut du produit
     * 
     * @return string
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statut du produit
     *
     * @param string $status
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

    }

    /**
     * Get id de la marque
     * 
     * @return int
     */ 
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set id de la marque
     * 
     * @param int $brand_id
     *
     */ 
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;

    }

    /**
     * Get id de la catégorie
     * 
     * @return int
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set id de la catégorie
     * 
     * @param int $category_id
     *
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

    }

    /**
     * Get id du type
     * 
     * @return int
     */ 
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set id du type
     * 
     * @param int $type_id
     *
     */ 
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

    }
}