<?php

namespace app\models;

use PDO;

class Product extends Model
{
    private $label;
    private $price;

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return Product
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function latest()
    {
        return static::database()->query('SELECT * FROM product order by id DESC')
            ->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO product VALUES(null,?,?)");
        return $sqlState->execute([
            $this->label,
            $this->price
        ]);
    }

    public static function view($id)
    {
        $sqlState = static::database()->prepare("SELECT * FROM product WHERE id = ?");
        $sqlState->execute([
            $id
        ]);
        return current($sqlState->fetchAll(PDO::FETCH_CLASS, __CLASS__));
    }

    public function update($id)
    {
        $sqlState = static::database()->prepare("
            UPDATE product
            SET
                label = ?,
                price   = ?
            WHERE id = ?
        ");
        return $sqlState->execute([
            $this->label,
            $this->price,
            $id
        ]);
    }

    public function destroy($id)
    {
        $sqlState = self::database()->prepare("DELETE FROM product WHERE id = ?");
        return $sqlState->execute([$id]);
    }
}