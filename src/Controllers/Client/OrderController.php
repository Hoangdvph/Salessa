<?php


namespace XuongOop\Salessa\Controllers\Client;

use XuongOop\Salessa\Commons\Controller;
use XuongOop\Salessa\Commons\Helper;
use XuongOop\Salessa\Models\Cart;
use XuongOop\Salessa\Models\CartDetail;
use XuongOop\Salessa\Models\Order;
use XuongOop\Salessa\Models\OrderDetail;
use XuongOop\Salessa\Models\Product;
use XuongOop\Salessa\Models\User;

class OrderController extends Controller
{
    private Order $order;
    private OrderDetail $orderDetail;
    private Product $product;
    private Cart $cart;
    private CartDetail $cartDetail;
    private User $user;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
        $this->user = new User();
    }

    public function checkout()
    {

        $userID = $_SESSION['user']['id'] ?? null;
        if (!$userID) {
            $conn = $this->user->getConnection();
            $this->user->insert([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['email'], PASSWORD_DEFAULT),
                'type' => 'member',
                'is_active' => 0
            ]);

            $userID = $conn->lastInsertId();
        }

        // thêm dữ liệu vào order và orderdetail
        $conn = $this->order->getConnection();
        $this->order->insert([
            'user_id' => $userID,
            'user_name' => $_POST['user_name'],
            'user_email' => $_POST['user_email'],
            'user_address' => $_POST['user_address'],
            'user_phone' => $_POST['user_phone'],

        ]);
        $orderID = $conn->lastInsertId();

        // orderDetail
        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }

        foreach ($_SESSION[$key]  as $productID => $item) {
            $this->orderDetail->insert([
                'order_id' => $orderID,
                'product_id' => $productID,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'price_sale' => $item['price_sale'],
            ]);
        }

        // xóa dữ liệu cart và cart detail  theo cartID - $_SESSION['cart_id]

        if(isset($_SESSION['user'])) {
            $this->cartDetail->deleteByCartID($_SESSION['cart_id']);

            $this->cart->deleteByUserID($userID);
        }

        unset($_SESSION[$key]);

        if(isset($_SESSION['user'])){
            unset($_SESSION['cart_id']);
        }


        header('Location: ' . url());
        exit;
    }
    public function showForm()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }
        $this->renderViewClient('checkouts.checkout', [
            'key' => $key
        ]);
    }
}
