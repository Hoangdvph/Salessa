<?php

namespace XuongOop\Salessa\Controllers\Admin;

use XuongOop\Salessa\Commons\Controller;

class UserController extends Controller
{
    private User $user;

    public function __construct(){
        $this->user = new User();
    }

    public function index(){
        $users = $this->user->paginate();

        $this->renderViewAdmin('users.index',[
            'users'=> $users
        ]);
    }

    public function create(){
        
    }
}