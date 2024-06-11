@extends('layouts.master')

@section('title')
    Thông tin đơn hàng
@endsection

@section('link')
    <link href="{{ asset('assets/client/css/checkout.css') }}" rel="stylesheet">
@endsection

@section('content')
    <main class="bg_gray">


        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <h1>Sign In or Create an Account</h1>

            </div>
            <!-- /page_header -->
            <form action="{{ url('order/checkout') }}" method="post">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="step first">
                            <h3>1. User Info and Billing address</h3>

                            @if (!empty($_SESSION['user']))
                            <div class="tab-content checkout">
                                <div class="tab-pane fade show active" id="tab_1" role="tabpanel"
                                    aria-labelledby="tab_1">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="email" name="user_email"  value="{{ $_SESSION['user']['email'] ?? null }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="tẽt" class="form-control" placeholder="name" name="user_name" value="{{ $_SESSION['user']['name'] ?? null }}">
                                    </div>
                                    <hr>

                                    <!-- /row -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full address" name="user_address" >
                                    </div>

                                    <!-- /row -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="phone" name="user_phone" >
                                    </div>
                                    <hr>

                                    <!-- /other_addr_c -->
                                    <hr>
                                </div>

                            </div>
                            @endif
                        </div>
                        <!-- /step -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="step last">
                            <h3>2. Order Summary</h3>

                            @foreach ($_SESSION[$key] as $item)
                                <div class="box_general summary">
                                    <ul>
                                        <li class="clearfix"><em>{{ $item['name'] }}</em> <span></span></li>
                                        
                                    </ul>
                                    <div class="total clearfix">TOTAL <span>{{ $item['quantity'] *  ( $item['price_sale'] ?: $item['price'] )}}</span></div>
                                
                                </div>
                            @endforeach
                            
                            <input type="submit" class="btn_1 full-width"  value="Confirm and Pay">
                            
                            <!-- /box_general -->
                        </div>
                        <!-- /step -->
                    </div>
                </div>
            </form>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
@endsection

@section('scripts')
    <script>
        // Other address Panel
        $('#other_addr input').on("change", function() {
            if (this.checked)
                $('#other_addr_c').fadeIn('fast');
            else
                $('#other_addr_c').fadeOut('fast');
        });
    </script>
@endsection
