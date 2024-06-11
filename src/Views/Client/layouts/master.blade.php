<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Allaia | Bootstrap eCommerce Template - ThemeForest</title>

    <!-- Favicons-->
    @include('layouts.partials.head')

	@yield('link')
	
	
</head>

<body>

    <div id="page">

        @include('layouts.partials.header')
        <!-- /header -->

        <main>
            @yield('content')
            <!-- /container -->
        </main>
        <!-- /main -->

        @include('layouts.partials.footer')
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    
	@include('layouts.partials.scripts')
    @yield('scripts')
   
</body>

</html>
