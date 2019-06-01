@extends('layouts.layout')

@section('title', "Main")

@section('content')
    <!--banner-starts-->
    <div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="images/bnr-1.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="images/bnr-3.jpg" alt=""/>
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
                            <img class="img-responsive" src=/images/{{$brand->img}} alt=""/>
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
    @if(count($hits))
    <div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                @foreach($hits as $hit)
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="#" class="mask"><img class="img-responsive zoom-img" src="images/{{$hit->img}}" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="#">{{$hit->title}}</a></h3>
                            <p>Explore Now</p>
                            <h4><a class="add-to-cart-link" href="cart/add?id={{$hit->id}}"><i></i></a>
                                <span class=" item_price">$ {{$hit->price}}</span>
                                @if($hit->old_price)
                                    <small><del>{{$hit->old_price}}</del></small>
                                @endif
                            </h4>
                        </div>
                        <div class="srch">
                            <span>-50%</span>
                        </div>
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