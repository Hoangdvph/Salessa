@extends('layouts.master')

@section('title')
    Giỏ hàng
@endsection

@section('link')
    <link href="{{ asset('assets/client/css/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                </ul>
            </div>
            <h1>Cart page</h1>
        </div>
        <!-- /page_header -->

        @if (!empty($_SESSION[$key]))

            <table class="table table-striped cart-list">
                <thead>
                    <tr>
                        <th>
                            Product
                        </th>

                        <th>
                            Price
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Subtotal
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cart = $_SESSION[$key];
                        // echo "<pre>";
                        // print_r($cart);
                    @endphp
                    @foreach ($cart as $item)
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="{{ asset($item['img_thumbnail']) }}"
                                        data-src="{{ asset($item['img_thumbnail']) }} " class="lazy" alt="Image">
                                </div>
                                <span class="item_cart">{{ $item['name'] }}</span>
                            </td>
                            <td>
                                <strong>{{ $item['price_sale'] ?: $item['price'] }}</strong>
                            </td>
                            <td>
                                <div class="d-flex">
                                    @php
                                        $url = url('cart/quantityDes') . '?productID=' . $item['id'];
                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                    @endphp
                                   <a class="btn btn-warning" href="{{ $url }}">-</a>

                                   <span class="btn border-dark">{{ $item['quantity'] }}</span>

                                    @php
                                        $url = url('cart/quantityInc') . '?productID=' . $item['id'];
                                        if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                        }
                                    @endphp
                                    <a class="btn btn-info" href="{{ $url }}">+</a>

                                  
                                </div>
                            </td>
                            <td>
                                <strong>{{ $item['quantity'] *  ( $item['price_sale'] ?: $item['price'] )}}</strong>
                            </td>
                            <td class="options">
                                @php
                                    $url = url('cart/remove') . '?productID=' . $item['id'];
                                    if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                        $url .= '&cartID=' . $_SESSION['cart_id'];
                                    }
                                @endphp
                                <a onclick="return confirm('Bạn có muốn xóa không ?')" href="{{ $url }}"><i
                                        class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @endif

       
        <!-- /cart_actions -->

    </div>
    <!-- /container -->

    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Subtotal</span> 
                        </li>
                        
                        <li>
                            <span>Total</span> 
                            @php
                                $total = 0;
                                foreach ($_SESSION[$key]  as $value) {
                                    $total += $value['quantity'] *  ( $value['price_sale'] ?: $value['price'] );
                                }

                                echo $total;
                            @endphp

                        </li>
                    </ul>
                    <a href="{{ url('order') }}" class="btn_1 full-width cart">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
