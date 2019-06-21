<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Luxury watches')</title>
    <script src="{{ asset('/js/popper.min.js') }}" defer></script>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="{{ asset('/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}} "></script>
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
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    <div class="box">
                        @widget('currency')
                    </div>
                    <div class="box1">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label">English :</option>
                            <option value="1">English</option>
                            <option value="2">French</option>
                            <option value="3">German</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="#" onclick="getCart(); return false;">
                        <div class="total">
                            <img src="{{asset('/images/cart-1.png')}}" alt="" />
                            @if(!empty($_SESSION['cart']))
                                <span class="simpleCart_total">
                                    {{$_SESSION['cart.currency']->symbol}}
                                    {{$_SESSION['cart.sum']}}
                                </span>
                            @else
                                <span class="simpleCart_total">{{__('Empty')}}</span>
                            @endif
                        </div>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--<div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    @guest
                        <a class="btn btn-default" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if(Route::has('register'))
                            <a class="btn btn-default" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <p class="text-white">{{ Auth::user()->login }}</p>

                        <a class="btn btn-default dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>-->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="{{route('main')}}"><h1>{{__('Watches shop')}}</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    @widget('menu')
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
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

<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p>Specials</p></a></li>
                    <li><a href="#"><p>New Products</p></a></li>
                    <li><a href="#"><p>Our Stores</p></a></li>
                    <li><a href="contact.html"><p>Contact Us</p></a></li>
                    <li><a href="#"><p>Top Sellers</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p>My Account</p></a></li>
                    <li><a href="#"><p>My Credit slips</p></a></li>
                    <li><a href="#"><p>My Merchandise returns</p></a></li>
                    <li><a href="#"><p>My Personal info</p></a></li>
                    <li><a href="#"><p>My Addresses</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>The company name,
                    <span>Lorem ipsum dolor,</span>
                    Glasglow Dr 40 Fe 72.</h4>
                <h5>+955 123 4567</h5>
                <p><a href="mailto:example@email.com">contact@example.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <form>
                    <input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-6 footer-right">
                <p>© 2019 Luxury Watches | Design by  Maksim Kashkin & Ilinov Ivan</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->

<!--Modal-start-->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{__('Cart')}}</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Continue buying')}}</button>
                <a href="#" type="button" class="btn btn-primary">{{__('Make order')}}</a>
                <button type="button" class="btn btn-danger" onclick="clearCart();">{{__('Clear cart')}}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--modal-end-->

<script src="{{ asset('js/main.js') }}"></script>

<!--<script src="{{ asset('/js/simpleCart.min.js') }}"> </script>-->
<script type="text/javascript" src="{{ asset('/js/memenu.js') }}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<!--dropdown-->
<script src="{{ asset('js/jquery.easydropdown.js') }}"></script>

</body>
</html>