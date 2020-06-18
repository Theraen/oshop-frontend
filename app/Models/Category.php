<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;

class Category extends CoreModel{

    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Fonction permettant de récupérer un produit
     * 
     * @param int $id
     */
    public function find($id) {

        $pdo = Database::getPDO();


        $sql = 'SELECT * FROM category WHERE id = ' . $id . ';';

        $pdoStatement = $pdo->query($sql);


        $categorys = $pdoStatement->fetchObject(self::class);

        return $categorys;
    }

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAll() {

        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM category;';

        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $category;
}

    /**
     * Fonction permettant de récupérer les category de la home
     * 
     */
    public function findCategoryInHome6() {

        $pdo = Database::getPDO();

        $sql = '
        SELECT *
        FROM category
        WHERE home_order != 0
        ORDER BY home_order
        LIMIT 2;'; 

        $pdoStatement = $pdo->query($sql);

        $categoryHome6 = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $categoryHome6;
}

    /**
     * Fonction permettant de récupérer les category de la home
     * 
     */
    public function findCategoryInHome4() {

        $pdo = Database::getPDO();

        $sql = '
        SELECT *
        FROM category
        WHERE home_order != 0
        ORDER BY home_order
        LIMIT 5 OFFSET 2;';

        $pdoStatement = $pdo->query($sql);

        $categoryHome6 = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $categoryHome6;
}
    
    /**
     * Get the value of subtitle
     *
     * @return  string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @param   string  $subtitle  
     *
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get the value of picture
     *
     * @return  string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param   string  $picture  
     *
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get the value of home_order
     *
     * @return  int
     */
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @param   int  $home_order  
     *
     */
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;
    }


}