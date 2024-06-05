@extends('layouts.master')

@section('title')
    Danh sách sản phẩm
@endsection


@section('content')
    <a href="{{ url("admin/products/create") }}" class="btn btn-primary">Thêm mới</a>

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
                    <td><img src="{{ asset($product['img_thumbnail']) }}" alt=""  width="100px"></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['created_at'] ?></td>
                    <td><?= $product['updated_at'] ?></td>
                    <td>
                        <a href="{{ url("admin/products/{$product['id']}/show") }}" class="btn btn-info">Show</a>
                        <a href="{{ url("admin/products/{$product['id']}/edit") }} " class="btn btn-info">Update</a>
                        <a href="{{ url("admin/products/{$product['id']}/delete") }}" class="btn btn-warning">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
