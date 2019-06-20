@extends('layouts.layout')

@section('title', "Main")

@section('content')
    <!--banner-starts-->
    <div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="{{asset('images/bnr-1.jpg')}}" alt=""/>
            </li>
            <li>
                <img src="{{asset('images/bnr-2.jpg')}}" alt=""/>
            </li>
            <li>
                <img src="{{asset('images/bnr-3.jpg')}}" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
    </div>
    <!--banner-ends-->
    <!--about-starts-->

    @if(count($brands))
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                @foreach($brands as $brand)
                    <div class="col-md-4 about-left">
                        <figure class="effect-bubba">
                            <img class="img-responsive" src="{{asset('images/'.$brand->img)}}" alt=""/>
                            <figcaption>
                                <h2>{{$brand->title}}</h2>
                                <p>{{$brand->description}}</p>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endif
    <!--about-end-->

    <!--product-starts-->
    @if(count($hits) && isset($_COOKIE['currency']))
        <?php $curr = json_decode($_COOKIE['currency']); ?>
    <div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                @foreach($hits as $hit)
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="{{route('product.show', ['alias' => $hit->alias])}}" class="mask">
                            <img class="img-responsive zoom-img" src="{{asset('images/'.$hit->img)}}" alt="" />
                        </a>
                        <div class="product-bottom">
                            <h3><a href="{{route('product.show', ['alias' => $hit->alias])}}">{{$hit->title}}</a></h3>
                            <p>{{__('Explore Now')}}</p>
                            <h4><a data-id="{{$hit->id}}" class="add-to-cart-link"
                                   href="{{route('cart.addProduct')}}"><i></i></a>
                                <span class="item_price">
                                    {{$curr->symbol}} {{$hit->price * $curr->value}}
                                </span>
                                @if($hit->old_price)
                                    <small><del>{{$hit->old_price * $curr->value}}</del></small>
                                @endif
                            </h4>
                        </div>
                        @if($hit->old_price)
                            <div class="srch">
                                <span>-{{(int)(($hit->price/$hit->old_price)*100)}}%</span>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </div>
    @endif
    <!--product-end-->

    <!--Slider-Starts-Here-->
    <script src="/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
@endsection