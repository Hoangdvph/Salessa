@extends('layouts.master')

@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Chi tiết sản phảm: {{ $product['name'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                
                <div class="table-responsive">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category Name</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Price</td>
                                <td>Overview</td>
                                <td>Content</td>
                                <td>created_at</td>
                                <td>updated_at</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['c_name'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td><img src="{{ asset($product['img_thumbnail']) }}" alt="" width="150px"></td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['overview'] ?></td>
                                <td><?= $product['content'] ?></td>
                                <td><?= $product['created_at'] ?></td>
                                <td><?= $product['updated_at'] ?></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>



@endsection




