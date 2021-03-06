<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>LV-BLOG :: @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <!-- BOOTSTRAP CSS -->
        {{HTML::style('dist/css/bootstrap.min.css')}}

        <!-- GOOGLE FONTS -->
        {{HTML::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700')}}

        <!-- Mordernizr && Respond -->
        {{HTML::script('dist/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}

    </head>

    <body>
        <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

        <div class="container">

            <h1 class="text-center">
                {{ link_to(route('home'), "LV-BLOG") }}
                @if(Auth::check()) 
                    <!-- User options -->
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin')}}">Dashboard</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </div>
                @elseif(empty(Request::segment(1))) 
                    <a class="btn btn-default pull-right" href="{{route('login')}}">Login</a>
                @endif
            </h1>

            @yield('content')
        </div>


        <!-- jQuery 1.11.2 minified -->
        {{HTML::script('dist/js/vendor/jquery-1.11.2.min.js')}}
        <!-- Bootstrap JS -->
        {{HTML::script('dist/js/vendor/bootstrap.min.js')}}

    </body>

</html>