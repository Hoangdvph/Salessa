<?php

namespace XuongOop\Salessa\Models;

use XuongOop\Salessa\Commons\Model;


class User extends Model
{
    protected string $tableName = 'users';

    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email= ? ')
            ->setParameter(0, $email) // xuất hiện 1 lần nên truyền số không vào 
            // doctrine sẽ đếm từ 0
            ->fetchAssociative();
    }
}