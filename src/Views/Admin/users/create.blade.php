@extends('layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Thêm mới sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <div class="table-responsive">
                        
                        {{-- Thông báo lỗi validate --}}
                        @if (!empty($_SESSION['errors']))
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($_SESSION['errors'] as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                                @php
                                    unset($_SESSION['errors']);
                                @endphp
                            </div>
                        @endif

                        <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                                            name="name">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail:</label>
                                        <input type="file" class="form-control" id="img_thumbnail"
                                            placeholder="Enter img_thumbnail" name="img_thumbnail">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="img_thumbnail" class="form-label">Email :</label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter email"
                                            name="email">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="overview" class="form-label">Password:</label>
                                        <input type="text" class="form-control" id="password" placeholder="Enter password"
                                            name="password">
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="password" class="form-label">Confirm Password:</label>
                                        <input type="text" class="form-control" id="confirm_password" placeholder="Enter confirm_password" name="confirm_password">
                                    </div>

                                </div>

                                
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Submit</button>
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