@extends('layouts.master')

@section('title')
    Danh sách danh mục
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách danh mục</h1>
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
                                   <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td>
                                            <a href="{{ url("admin/categories/{$category['id']}/edit") }} "
                                                class="btn btn-info">Update</a>
                                            <a href="{{ url("admin/products/{$product['id']}/delete") }}"
                                                class="btn btn-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
