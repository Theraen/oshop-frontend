<?php

namespace oShop\Models;

use oShop\Utils\Database;
use PDO;


class Type extends CoreModel{

    //Les propriété
    private $footer_order;

            /**
     * Fonction permettant de récupérer un produit
     * 
     * @param int $id
     */
    public function find($id) {

        $pdo = Database::getPDO();


        $sql = 'SELECT * FROM type WHERE id = ' . $id . ';';

        $pdoStatement = $pdo->query($sql);


        $type = $pdoStatement->fetchObject(self::class);

        return $type;
    }

    /**
     * Fonction permettant de récupérer tous les produits
     * 
     */
    public function findAll() {

        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM type;';

        $pdoStatement = $pdo->query($sql);

        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
}

public function findAllForFooter() {
    
    $pdo = Database::getPDO();

    //requête pour récupérer un type
    $sql = '
    SELECT *
    FROM type
    WHERE footer_order != 0
    ORDER BY footer_order ASC;';

    $pdoStatement = $pdo->query($sql);

    $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    return $types;

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