@extends('layouts.master')

@section('title')
    Cập nhật sản phẩm
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Cập nhật sản phẩm: {{ $product['name'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <div class="table-responsive">

                        {{-- Thông báo lỗi validate --}}
                        @if (!empty($_SESSION['errors']))
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($_SESSION['errors'] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @php
                                unset($_SESSION['errors']);
                            @endphp
                        @endif


                        @if (!empty($_SESSION['status']) && $_SESSION['status'])
                            <div class="alert alert-warning">
                                {{ $_SESSION['msg'] }}
                            </div>
                            @php
                                unset($_SESSION['status']);
                                unset($_SESSION['msg']);
                            @endphp
                        @endif

                        <form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data"
                            method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Category:</label>

                                        <select name="category_id" id="category_id" class="form-select">
                                            @foreach ($categoryPluck as $id => $name)
                                                <option @if ($product['category_id'] == $id) selected @endif
                                                    value="{{ $id }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                                            name="name" value="{{ $product['name'] }}">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail:</label>
                                        <input type="file" class="form-control" id="img_thumbnail"
                                            placeholder="Enter img_thumbnail" name="img_thumbnail">
                                        <img src="{{ asset($product['img_thumbnail']) }}" alt="">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="img_thumbnail" class="form-label">Price :</label>
                                        <input type="text" class="form-control" id="price" placeholder="Enter price "
                                            name="price" value="{{ $product['price'] }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 mt-3">
                                        <label for="overview" class="form-label">Overview:</label>
                                        <textarea class="form-control" id="overview" placeholder="Enter overview" name="overview" value="">{{ $product['overview'] }}</textarea>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="content" class="form-label">Content:</label>
                                        <textarea class="form-control" id="content" rows="7" placeholder="Enter content" name="content" value="">{{ $product['content'] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
                            <a href="{{ url('admin/products/') }}" class="btn btn-primary mt-5">Danh sách</a>
                        </form>
                        {{-- @for ($i = 1; $i < $totalPage; $i++)
                        <ul class="pagination">
                            <li><a href="{{ url("admin/products/?page = $id ") }}">{{ $i }}</a></li>
                        </ul>
                    @endfor --}}
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
