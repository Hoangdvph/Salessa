<?php

namespace XuongOop\Salessa\Controllers\Admin;

use Rakit\Validation\Validator;
use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\Category;

// use XuongOop\Salessa\Commons\Model;

class CategoryController extends Controller
{
    protected Category $category;
    public function __construct(){
        $this->category = new Category();
    }

    public function index(){
        $categories = $this->category->all();   
        $this->renderViewAdmin('categories.index', [
            'categories'=> $categories
        ]);
    }

    public function create(){ 
        $this->renderViewAdmin('categories.create', []);
     }
    
    public function store(){
        $validador = new Validator();
        $vadidation = $validador->make($_POST, [
            'name' => 'required'
        ]);

        $vadidation->validate();

        if($vadidation->fails()){
            $_SESSION['errors'] = $vadidation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/'));
            exit;
        }else{
            $data = [
                'name' => $_POST['name']
            ];

            $this->category->insert($data);
            
            header('Location: ' . url('admin/categories'));
        }
    }


    public function edit($id){
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categories.edit' , [
            'category'=> $category
        ]);
    }

    public function update($id){  
        $category = $this->category->findByID($id);
        $validador = new Validator();
        $vadidation = $validador->make($_POST, [
            'name' => 'required'
        ]);

        $vadidation->validate();

        if($vadidation->fails()){
            $_SESSION['errors'] = $vadidation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        }else{
            $data = [
                'name' => $_POST['name']
            ];

            $this->category->update($id,$data);
            
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        }
    }

    public function delete($id){
        $product = $this->category->findByID($id);
        $this->category->delete($id);
        header('Location: '. url('admin/categories'));
        exit;
    }


}