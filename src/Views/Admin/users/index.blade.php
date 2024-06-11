@extends('layouts.master')

@section('title')
    
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách người dùng</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                
                <div class="table-responsive">
                    
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Avatar</td>
                               
                                
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                    </td>
                                    
                                    <td>
                                        <a href="{{ url("admin/users/{$user['id']}/show") }}"
                                            class="btn btn-info">Show</a>
                                        <a href="{{ url("admin/users/{$user['id']}/edit") }} "
                                            class="btn btn-info">Update</a>
                                        <a href="{{ url("admin/users/{$user['id']}/delete") }}"
                                            class="btn btn-warning">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>


</div>
@endsection