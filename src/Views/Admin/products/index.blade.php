@extends('layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    
                    <div class="table-responsive">
                        {{-- <a href="{{ url('admin/products/create') }}" class="btn btn-primary">Thêm mới</a> --}}
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Category Name</td>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Price</td>
                                    <td>created_at</td>
                                    <td>updated_at</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= $product['c_name'] ?></td>
                                        <td><?= $product['name'] ?></td>
                                        <td><img src="{{ asset($product['img_thumbnail']) }}" alt="" width="100px">
                                        </td>
                                        <td><?= $product['price'] ?></td>
                                        <td><?= $product['created_at'] ?></td>
                                        <td><?= $product['updated_at'] ?></td>
                                        <td>
                                            <a href="{{ url("admin/products/{$product['id']}/show") }}"
                                                class="btn btn-info">Show</a>
                                            <a href="{{ url("admin/products/{$product['id']}/edit") }} "
                                                class="btn btn-info">Update</a>
                                            <a href="{{ url("admin/products/{$product['id']}/delete") }}"
                                                class="btn btn-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @for ($i = 1; $i < $totalPage; $i++)
                            <ul class="pagination">
                                <li><a href="{{ url("admin/products/?page = $id ") }}">{{ $i }}</a></li>
                            </ul>
                        @endfor
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
