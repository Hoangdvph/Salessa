<?php

namespace XuongOop\Salessa\Controllers\Admin;


use XuongOop\Salessa\Commons\Controller;


class DashBoardController extends Controller
{
    public function dashboard(){
        $this->renderViewAdmin(__FUNCTION__);
    }
}