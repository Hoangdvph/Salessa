@extends('layouts.master')

@section('title')
    Chi tiết người dùng
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Chi tiết người dùng</h1>
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
                                <td>type</td>
                                <td>created_at</td>
                                <td>updated_at</td>
                                <td>is_active</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                </td>
                                <td><?= $user['type'] ?></td>
                                <td><?= $user['created_at'] ?></td>
                                <td><?= $user['updated_at'] ?></td>
                                <td>
                                    @if ($user['is_active']  == 1)
                                        {{ 'Đã kích hoạt' }}
                                    @else
                                        {{ 'Chưa kích hoạt' }}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>


</div>
@endsection