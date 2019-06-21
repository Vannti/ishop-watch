@extends('layouts.layout')

@section('title', "Product")

@section('content')
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            @if(count($product->galleries))
                            <div class="flexslider">
                                <ul class="slides">
                                    @foreach($product->galleries as $gallery)
                                        <li data-thumb="{{asset('images/'.$gallery->img)}}">
                                            <div class="thumb-image">
                                                <img src="{{asset('images/'.$gallery->img)}}"
                                                     data-imagezoom="true" class="img-responsive" alt=""/>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                                <img src="{{asset('images/'.$product->img)}}" alt="{{$product->alias}}">
                            @endif
                        </div>

                        <?php $curr = json_decode($_COOKIE['currency']);  ?>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{$product->title}}</h2>
                                <h5 class="item_price">
                                    {{$curr->symbol}} {{$product->price * $curr->value}}
                                    @if($product->old_price)
                                        <small><del>{{$product->old_price * $curr->value}}</del></small>
                                    @endif
                                </h5>

                                @if($product->content)
                                    <p>{{$product->content}}</p>
                                @else
                                    <p>{{__('Product has not content')}}</p>
                                @endif

                                <ul class="tag-men">
                                    <span>Category</span>
                                    @if(count($product->categories))
                                        @foreach($product->categories as $category)
                                            <li>
                                                <a href="{{route('products.category', [
                                                'category' => $category->alias])}}">
                                                    {{$category->alias}}
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>{{__('Product has not any category')}}</p>
                                    @endif
                                </ul>
                                <div class="quantity">
                                    <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                                </div>
                                <a id="productAdd" data-id="{{$product->id}}"
                                   href="{{route('cart.addProduct')}}"
                                   class="add-cart item_add add-to-cart-link">
                                    {{__('ADD TO CART')}}
                                </a>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tabs">
                        <ul class="menu_drop">
                            <li class="item1"><a href="#"><img src="/images/arrow.png" alt="">Description</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item3"><a href="#"><img src="/images/arrow.png" alt="">Reviews (10)</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 single-right">
                    <div class="w_sidebar">
                        <section  class="sky-form">
                            <h4>Catogories</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>
                                </div>
                            </div>
                        </section>
                        <section  class="sky-form">
                            <h4>Brand</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                                </div>
                            </div>
                        </section>

                        <section class="sky-form">
                            <h4>discount</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                                </div>
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- FlexSlider -->
    <script src="/js/imagezoom.js"></script>
    <script defer src="/js/jquery.flexslider.js"></script>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a  = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
@endsection