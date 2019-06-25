@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <!--banner-starts-->
    <div class="bnr" id="home">
        <div  id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                <li>
                    <img src="{{asset('/images/bnr-1.jpg')}}" alt=""/>
                </li>
                <li>
                    <img src="{{asset('/images/bnr-2.jpg')}}" alt=""/>
                </li>
                <li>
                    <img src="{{asset('/images/bnr-3.jpg')}}" alt=""/>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--banner-ends-->


    <!--Slider-Starts-Here-->
    <script src="{{asset('/js/responsiveslides.min.js')}}"></script>
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