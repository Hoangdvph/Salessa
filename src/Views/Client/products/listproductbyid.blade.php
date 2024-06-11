@extends('layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection

@section('link')
    <link href="{{ asset('assets/client/css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="top_banner">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <h1>Shoes - Grid listing</h1>
            </div>
        </div>
        <img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
    </div>
    <!-- /top_banner -->

    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="sort_select">
                        <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to
                        </select>
                    </div>
                </li>
                <li>
                    <a href="#0"><i class="ti-view-grid"></i></a>
                    <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false"
                        aria-controls="filters">
                        <i class="ti-filter"></i><span>Filters</span>
                    </a>
                </li>
            </ul>
            <div class="collapse" id="filters">
                @include('categories.index')
            </div>
        </div>
    </div>
    <!-- /toolbox -->

    <div class="container margin_30">
        <div class="row small-gutters">
            @foreach ($product as $pro)
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="grid_item">
                        <figure>
                            <span class="ribbon off">-30%</span>
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="{{ asset($pro['img_thumbnail']) }}"
                                    data-src="{{ asset($pro['img_thumbnail']) }}" style="width:270px; height:270px;"
                                    alt="">
                            </a>
                            <div data-countdown="2019/05/15" class="countdown"></div>
                        </figure>
                        <a href="product-detail-1.html">
                            <h3>{{ $pro['name'] }}</h3>
                        </a>
                        <div class="price_box">
                            @if ($pro['price_sale'] == null || $pro['price_sale'] < 0)
                                <span class="old_price">{{ $pro['price'] }}</span>
                            @else
                                <span class="new_price">{{ $pro['price_sale'] }}</span>
                                <span class="old_price">{{ $pro['price'] }}</span>
                            @endif

                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
                                        compare</span></a>
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach

            <!-- /col -->


        </div>
        <!-- /row -->

        <div class="pagination__wrapper">
            <ul class="pagination">
                @if ($page > 1)
                    <li><a href="{{ url('products?page=' . ($page - 1 == 0 ? 1 : $page - 1)) }}" class="prev"
                            title="previous page">&#10094;</a></li>
                @endif
                @for ($i = 1; $i <= $totalPage; $i++)
                    <li>
                        <a href="{{ url('products?page=' . $i) }}" class="{{ $page == $i ? 'active' : '' }}">{{ $i }}</a>
                    </li>
                @endfor
                @if ($page < $totalPage)
                    <li><a href="{{ url('products?page=' . ($page + 1 > $totalPage ? $totalPage : $page + 1)) }}"
                            class="next" title="next page">&#10095;</a></li>
                @endif
            </ul>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/specific_listing.js') }}"></script>
@endsection
