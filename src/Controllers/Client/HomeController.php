<?php

namespace XuongOop\Salessa\Controllers\Client;

use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\Category;
use XuongOop\Salessa\Models\Product;

class HomeController extends Controller
{
    private Category $category;

    private Product $product;
    public function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
    }

    public function index()
    {
        $categories = $this->category->all();
        [ $products,$totalPage ] = $this->product->paginate();
        $this->renderViewClient('index', [
            'categories' => $categories,
            'products' => $products,
            'total'=> $totalPage
        ]);

    }


    // public function show($id){
    //     // [ $prodcuts, $totalPage ] = 
    //     // $product
    //     $categories = $this->category->all();
    //     $productByIDCate = $this->product->findByIDCate($id);
    //     // Helper::debug($productByIDCate);
    //     $this->renderViewClient('products.listproductbyid',[
    //         'product'=>$productByIDCate,
    //         'categories' => $categories
    //     ]);

    // }

    // public function showdetail($id){
    //     $categories = $this->category->all();
    //     $product = $this->product->findByID($id);
    //     // Helper::debug($product);
    //     $this->renderViewClient('products.productdetail',[
    //         'product'=>$product,
    //         'categories' => $categories
    //     ]);
    // }

    // public function listproduct(){
    //     $categories = $this->category->all();
    //     $page = $_GET['page'] ?? 1;
    //     if($page <= 0){
    //         header('Location: '  . url('products'));
    //         exit();
    //     }
    //     [ $products,$totalPage ] = $this->product->paginate($page,8);
    //     // Helper::debug($products);
    //     $this->renderViewClient('products.listproduct', [
    //         'categories' => $categories,
    //         'products' => $products,
    //         'totalPage'=> $totalPage,
    //         'page' => $page
    //     ]);
    // }
    
}
