<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href=" index-2.html"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        
        <li class>
            <a class="has-arrow" href=" #" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/11.svg')}}" alt>
                </div>
                <span>Table</span>
            </a>
            <ul>
                <li><a href="{{ asset('assets/admin/data_table.html') }} ">Data Tables</a></li>
                <li><a href="{{ asset('assets/admin/bootstrap_table.html') }}  ">Bootstrap</a></li>
            </ul>
        </li>
        
    </ul>
</nav>