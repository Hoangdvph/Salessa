<?php

namespace XuongOop\Salessa\Controllers\Client;

use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\Cart;
use XuongOop\Salessa\Models\CartDetail;
use XuongOop\Salessa\Models\Product;

class CartController extends Controller
{
    private Product $product;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }

    public function add()
    {
        // Helper::
        // lấy thông tin sản phẩm theo id

        $product = $this->product->findByID($_GET['productID']);

        if (!empty($product)) {


            // khởi tạo session giở hàng
            // check đăng nhập để có session giỏ hàng tương ứng
            $key = 'cart';
            if (isset($_SESSION['user'])) {

                $key .= '-' . $_SESSION['user']['id'];
            }


            if (!isset($_SESSION[$key][$product['id']])) {

                $_SESSION[$key][$product['id']]  = $product + ['quantity'  => $_GET['quantity']];
            } else {

                $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
            }


            // Helper::debug($_SESSION[$key]);

            if (isset($_SESSION['user'])) {

                $conn = $this->cart->getConnection();

                // $conn->beginTransaction();
                try {
                    //code...
                    $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                    
                    if (empty($cart)) {
                        $this->cart->insert([
                            'user_id' => $_SESSION['user']['id'],
                        ]);
                    }


                    $cartID = $cart['id'] ?? $conn->lastInsertId();

                    $_SESSION['cart_id'] = $cartID;
                    
                    // Helper::debug($_SESSION);
                    $this->cartDetail->deleteByCartID($cartID);
                    foreach ($_SESSION[$key]  as $productID => $item) {


                        $this->cartDetail->insert([
                            'cart_id' => $cartID,
                            'product_id' => $productID,
                            'quantity' => $item['quantity'],
                        ]);
                    }

                    // $conn->commit();
                } catch (\Throwable $th) {
                    //throw $th;

                }
            }
        }
        // nếu đăng nhập thì phải lưu session trong db

        header('Location: ' . url('cart/detail'));
        exit;
    }

    public function detail()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }
        $this->renderViewClient('carts.cart', [
            'key' => $key
        ]);
    }
    public function quantityInc()
    { // tăng số lượng
        //lấy ra dữ liệu từ cart_detail để đảm bảo nó có tồn tại bản ghi

        //Thấy đổi trong session

        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }
        $_SESSION[$key][$_GET['productID']]['quantity'] += 1;
        
        // thây đổi trong database

        if(isset($_SESSION['user'])){
            // Helper::debug('aaaa');
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity'] 
            );
        }

        header('Location:'. url('cart/add'));
        exit;
    }

    public function quantityDes()
    { // giảm số lượng
        //lấy ra dữ liệu từ cart_detail để đảm bảo nó có tồn tại bản ghi

        //Thấy đổi trong session

        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }
        if($_SESSION[$key][$_GET['productID']]['quantity'] > 1){
            $_SESSION[$key][$_GET['productID']]['quantity'] -=1;
        }
        // thây đổi trong database

        if(isset($_SESSION['user'])){
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']           
            );
        }

        header('Location:'. url('cart/add'));
        exit;

    }

    // public function quantity()
    // {
    //     $key = 'carts';
    //     if (isset($_SESSION['users'])) {
    //         $key .= '-' . $_SESSION['users']['id'];
    //     }
    //     if (isset($_GET['productId']) && $_GET['productId'] != "") {
    //         if (!empty($_SESSION[$key][$_GET['productId']])) {
    //             if (isset($_GET['inc'])) {
    //                 $_SESSION[$key][$_GET['productId']]['quantity'] += 1;
    //             }
    //             if (isset($_GET['dec']) && $_SESSION[$key][$_GET['productId']]['quantity'] > 1) {
    //                 $_SESSION[$key][$_GET['productId']]['quantity'] -= 1;
    //             }
    //         }
    //     }
    //     if (isset($_SESSION['users'])) {
    //         $this->cartDetail->updateByCartIDAndProductID(
    //             $_SESSION['cart_id'],
    //             $_GET['productId'],
    //             $_SESSION[$key][$_GET['productId']]['quantity']
    //         );
    //     }
    //     header('Location:' . url('cartDetail'));
    //     exit;
    // }
    public function remove()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }
        unset($_SESSION[$key][$_GET['productID']]);

        if(isset($_SESSION['user'])){
            $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
}
