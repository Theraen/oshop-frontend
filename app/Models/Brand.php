<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;

class Brand extends CoreModel {

    //Les propriété
    private $footer_order;

    public function find($id) {

        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM brand WHERE id = ' . $id . ';';

        $pdoStatement = $pdo->query($sql);

        $brand = $pdoStatement->fetchObject(self::class);

        return $brand;
    }

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAll() {

        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM brand;';

        $pdoStatement = $pdo->query($sql);

        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $brands;
}

public function findAllForFooter() {
    
    $pdo = Database::getPDO();

    //requête pour récupérer un type
    $sql = '
    SELECT *
    FROM brand
    WHERE footer_order != 0
    ORDER BY footer_order ASC;';

    $pdoStatement = $pdo->query($sql);

    $brand = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    return $brand;
}



    /**
     * Get the value of footer_order
     *
     * @return  int
     */
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @param   int  $footer_order  
     *
     */
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

    }

}