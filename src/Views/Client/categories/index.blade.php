<nav class="categories menu">
    <ul class="clearfix">
        <li><span>
                <a href="#">
                    <span class="hamburger hamburger--spin">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                    Categories
                </a>
            </span>
            <div id="menu">
                <ul>
                    @foreach ($categories as $category)
                        <li><span><a href="{{ url("{$category['id']}/listproductbyidcate") }}">{{ $category['name'] }}</a></span></li>
                    @endforeach
                    {{-- <li><span><a href="{{ url('pQ') }}">Collections</a></span></li>
                    <li><span><a href="#">Men</a></span></li>
                    <li><span><a href="#">Women</a></span></li>
                    <li><span><a href="#">Boys</a></span></li>
                    <li><span><a href="#">Girls</a></span></li>
                    <li><span><a href="#">Customize</a></span></li> --}}
                </ul>
            </div>
        </li>
    </ul>
</nav>