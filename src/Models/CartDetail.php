<?php

namespace XuongOop\Salessa\Models;

use XuongOop\Salessa\Commons\Model;

class CartDetail  extends Model
{
    protected string $tableName = 'cart_details';
    public function findByCartIDAndProductID($cartID, $productID)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('cart_id= ? ')->setParameter(0, $cartID)
            ->where('prodcut_id = ?')
            ->setParameter(1, $productID)
            ->fetchAssociative();
    }

    public function deleteByCartID($cartID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id = ?')
            ->setParameter(0, $cartID)
            ->executeQuery();
    }


    public function deleteByCartIDAndProductID($cartID, $productID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('cart_id= ? ')
            ->andWhere('product_id = ?')
            ->setParameter(0, $cartID)
            ->setParameter(1, $productID)
            ->executeQuery();
    }

    public function updateByCartIDAndProductID($cartID, $productID, $quantity)
    {

        $query = $this->queryBuilder->update($this->tableName);
//  echo $query; die;
        $query

            ->set('quantity', '?')->setParameter(0, $quantity)
            ->where('cart_id= ? ')->setParameter(1, $cartID)
            ->andWhere('product_id = ?')->setParameter(2, $productID)
            ->executeQuery();
    }

    
}
