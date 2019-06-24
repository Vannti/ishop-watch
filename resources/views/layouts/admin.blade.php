<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Luxury watches')</title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="{{ asset('/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}} "></script>
    <script src="{{ asset('/js/popper.min.js') }}" defer></script>

    <script src="{{ asset('js/jquery.easydropdown.js') }}"></script>
    <!--theme-style-->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/css/memenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--start-menu-->
</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="top-header-left">
                <div class="cart box_1">
                    @guest
                        <a class="btn btn-default" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if(Route::has('register'))
                            <a class="btn btn-default" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                    <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->login }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="btn btn-default" href="{{route('main')}}">{{__('User Panel')}}</a>
                                </li>
                                <li>
                                    <a class="btn btn-default" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    @endguest

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="{{route('admin.main')}}"><h1>{{__('Admin panel')}}</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li>
                            <a href="{{route('admin.main')}}">{{__('Main')}}</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('admin.categories')}}">{{__('Categories')}}</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('admin.brands')}}">{{__('Brands')}}</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('admin.currencies')}}">{{__('Currencies')}}</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('admin.products')}}">{{__('Products')}}</a>
                        </li>
                        <li class="grid">
                            <a href="{{route('admin.orders')}}">{{__('Orders')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route('search')}}" method="GET" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="{{__('Search')}}">
                        <input type="submit" value="">
                    </form>
                    <!--<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">-->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->

<div class="content">
    @yield('content')
</div>

<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <p>© 2019 Watches show | Design by  Maksim Kashkin & Ilinov Ivan</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->


<script src="{{asset('/js/typeahead.bundle.js')}}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<!--<script src="{{ asset('/js/simpleCart.min.js') }}"> </script>-->
<script type="text/javascript" src="{{ asset('/js/memenu.js') }}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!--dropdown-->

</body>
</html>