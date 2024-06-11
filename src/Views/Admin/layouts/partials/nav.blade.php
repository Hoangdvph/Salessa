<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ url('admin') }}"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu" >
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg')}}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>
                <li><a href="{{ asset('assets/admin/data_table.html') }} ">Data Tables</a></li>
                <li><a href="{{ asset('assets/admin/bootstrap_table.html') }}  ">Bootstrap</a></li>
            </ul>
        </li>
        
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/11.svg')}}" alt>
                </div>
                <span>Categories</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/categories/')  }} ">Danh sách danh mục</a></li>
                <li><a href="{{ url('admin/categories/create ') }}  ">Thêm mới danh mục</a></li>
            </ul>
        </li>
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/11.svg')}}" alt>
                </div>
                <span>Product</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/products/')  }} ">Danh sách sản phẩm</a></li>
                <li><a href="{{ url('admin/products/create ') }}  ">Thêm mới sản phẩm</a></li>
            </ul>
        </li>
        <li class="mm-active">
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/11.svg')}}" alt>
                </div>
                <span>Users</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/users/')  }} ">Danh sách người dùng</a></li>
                <li><a href="{{ url('admin/users/create ') }}  ">Thêm mới users</a></li>
            </ul>
        </li>
        
    </ul>
</nav>