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
                                <div id="products">
                                    <img src="{{asset('images/'.$product->img)}}" alt="{{$product->alias}}">
                                </div>
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
                            <li class="item1"><a href="#"><img src="{{asset('/images/arrow.png')}}" alt="">{{__('Description')}}</a>
                                <ul>
                                    <li class="subitem1"><a href="#">{{$product->description}}</a></li>
                                </ul>
                            </li>
                            <li class="item1"><a href="#"><img src="{{asset('/images/arrow.png')}}" alt="">{{__('Add Comment')}}</a>
                                <ul>
                                    <form method="POST" action="{{route('comment.add', ['alias' => $product->alias])}}" role="form">
                                        @csrf
                                        <textarea name="text" class="form-control" placeholder="{{__('Text comment')}}"></textarea>
                                        <input type="submit" class="btn btn-default" value="{{__('Add')}}">
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    @include('partial.error')
                    @include('partial.success')
                    @foreach($comments as $comment)
                    <div class="media border p-3">
                        <img src="{{asset('images/comments.png')}}" alt="user_avatar" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">
                            <h4>{{$comment->user->login}}<small><i>Posted on {{$comment->created_at}}</i></small></h4>
                            <p>{{$comment->text}}</p>
                        </div>
                    </div>
                    @endforeach
                    <div class="pagination">
                        {{$comments->links()}}
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

    <!-- FlexSlider -->
    <script src="{{asset('/js/imagezoom.js')}}"></script>
    <script defer src="{{asset('/js/jquery.flexslider.js')}}"></script>

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