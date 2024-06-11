<?php 

const PATH_ASSET = __DIR__ . '/assets/' ;

// PATH_ROOT :  lấy đường dẫn tuyện đối  để tránh rủ do về việc thay đổi đường dẫn thư mục 
const PATH_ROOT = __DIR__ . '/' ;

if (!function_exists('show_upload')) {
    function show_upload($path) {
        return $_ENV['BASE_URL'] . '/assets/' . $path;
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        return $_ENV['BASE_URL'] . $path;
    }
}

if (!function_exists('url')) {
    function url($uri = null) {
        return $_ENV['BASE_URL'] . $uri;
    }
}


if (!function_exists('is_logged')) { // check đã đăng nhập
    function is_logged() {
        return isset($_SESSION['user']);
    }
}


if (!function_exists('is_admin')) {
    function is_admin() {
        return is_logged()  || $_SESSION['user']['type']  == 'admin';
    }
}


if (!function_exists('avoid_login')) {
    function avoid_login() {
        if(is_logged()){
            if($_SESSION['user']['type'] == 'admin'){
                header('Location: ' . url('admin/'));
                exit;
            }

            header('Location:'. url(''));
            exit;
        }
    }
}


