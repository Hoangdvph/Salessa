<?php

namespace XuongOop\Salessa\Models;

use XuongOop\Salessa\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    // hiển thị tên danh mục 
    public function all()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.price',
                'p.price_sale',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();
    }
    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.price',
                'p.price_sale',
                'p.overview',
                'p.content',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }

    public function paginate($page = 1, $perPage = 8)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offSet = $perPage * ($page - 1);

        // perPage số lượng bản ghi muốn lấy ra
        // với page = 1
        // 1 -> 0 () đếm theo vị trí index
        // 2
        // 3
        // 4 
        // 5 -> 4 ( offSet = 4 )

        // với page = 2
        // 6 -> 5 ()
        // 7
        // 8
        // 9 
        // 10 -> 9 ( offSet =  9)

        $data = $queryBuilder
            ->select(
                'p.id',
                'p.category_id',
                'p.name',
                'p.img_thumbnail',
                'p.price',
                'p.price_sale',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->setFirstResult($offSet)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function findByIDCate($id){
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('category_id = ?')
        ->setParameter(0, $id)
        ->fetchAllAssociative();
    }
    
    // SELECT COUNT(*) AS SoLuong FROM `products` WHERE category_id = 1 GROUP BY category_id;
}
