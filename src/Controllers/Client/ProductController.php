<?php

namespace XuongOop\Salessa\Controllers\Client;

use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\Product;

class ProductController extends Controller
{
    private Product $product;
    public function __construct()
    {
        $this->product = new Product();
    }


    public function show($id){
        // [ $prodcuts, $totalPage ] = 
        // $product
        // $categories = $this->category->all();
        $productByIDCate = $this->product->findByIDCate($id);
        // Helper::debug($productByIDCate);
        $this->renderViewClient('products.listproductbyid',[
            'product'=>$productByIDCate,
            // 'categories' => $categories
        ]);

    }

    public function showdetail($id){
        // $categories = $this->category->all();
        $product = $this->product->findByID($id);
        // Helper::debug($product);
        $this->renderViewClient('products.productdetail',[
            'product'=>$product,
            // 'categories' => $categories
        ]);
    }

    public function listproduct(){
        
        $page = $_GET['page'] ?? 1;
        if($page <= 0){
            header('Location: '  . url('products'));
            exit();
        }
        [ $products,$totalPage ] = $this->product->paginate($page,8);
        // Helper::debug($products);
        $this->renderViewClient('products.listproduct', [
            
            'products' => $products,
            'totalPage'=> $totalPage,
            'page' => $page
        ]);
    }
    
}
