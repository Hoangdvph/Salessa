<?php

namespace XuongOop\Salessa\Models;

use XuongOop\Salessa\Commons\Model;

class Cart  extends Model
{
    protected string $tableName = 'carts';
    public function findByUserID($userID){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id= ? ')
            ->setParameter(0, $userID) // xuất hiện 1 lần nên truyền số không vào 
            // doctrine sẽ đếm từ 0
            ->fetchAssociative();
    }
    
    public function deleteByUserID($userID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->executeQuery();
    }
}