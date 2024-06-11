<?php

namespace XuongOop\Salessa\Controllers\Admin;

use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\User;

class LoginController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function showFormLogin()
    {
        avoid_login();
        $this->renderViewClient('users.login', []);
    }

    public function login()
    {
        avoid_login();
        // Helper::debug($_POST);
        unset($_SESSION['cart']);
        try {
            $user = $this->user->findByEmail($_POST['email']);
            // Helper::debug($user);
            
            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {
                $_SESSION['user'] = $user;
                // Helper::debug($_SESSION['user']);
                if ($user['type'] == 'admin') {
                    
                    // Helper::debug($_SESSION['user']);
                    header('Location: ' . url('admin/'));
                    exit;
                }

                header('Location: ' . url());
                exit;
            }




            throw new \Exception('Passwword không đúng');
        } catch (\Throwable $th) {
            //throw $th;
            // Helper::debug($th->getMessage());
            $_SESSION['errors'] = $th->getMessage();
            header('Location: ' . url('login'));
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['cart' . '-' . $_SESSION['user']['id']]);
        header('Location: ' . url());
        exit;
    }
}
