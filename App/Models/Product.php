<?php

namespace App\Models;

use PDO;

/** 
 * Example Product model
 */
class Product extends \Core\Model
{
    /**
     * Display the products
     */
    public function displayProducts()
    {
        $sql = 'SELECT * FROM
                product';
        $db = static::getDB();
        $stmt = $db->prepare($sql);
        return $stmt->execute();

    }
}