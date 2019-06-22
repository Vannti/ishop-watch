@extends('layouts.layout')

@section('title', "Products")

@section('content')
    <div class="prdt">
        <div class="container">
            <div class="prdt-top">
                <div class="col-md-9 prdt-left">
                    @if(count($products))
                    <div class="product-one">
                        <?php $curr = json_decode($_COOKIE['currency']); ?>
                        @foreach($products as $product)
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="{{route('product.show', ['alias' => $product->alias])}}" class="mask">
                                    <img class="img-responsive zoom-img" src="{{asset('images/'.$product->img)}}" alt="{{$product->alias}}">
                                </a>
                                <div class="product-bottom">
                                    <h3>
                                        <a href="{{route('product.show', ['alias' => $product->alias])}}">
                                            {{$product->title}}
                                        </a>
                                    </h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add add-to-cart-link"
                                            data-id="{{$product->id}}"
                                            href="{{route('cart.addProduct', [
                                            'id' => $product->id])}}"><i></i>
                                        </a>
                                        <span class=" item_price">{{$curr->symbol}} {{$product->price * $curr->value}}</span>
                                        @if($product->old_price)
                                            <small><del>{{$product->old_price * $curr->value}}</del></small>
                                        @endif
                                    </h4>
                                </div>
                                @if($product->old_price)
                                    <div class="srch">
                                        <span>-{{(int)(($product->price/$product->old_price)*100)}}%</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                    {{$products->links()}}
                    @else
                        <p class="not-found-text">{{__('Products of your query not found')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="product not found">
                    @endif
                </div>
                <div class="col-md-3 prdt-right">
                    <div class="w_sidebar">
                        <section class="sky-form">
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
                        <section class="sky-form">
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
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
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
                            <h4>Colour</h4>
                            <ul class="w_nav2">
                                <li><a class="color1" href="#"></a></li>
                                <li><a class="color2" href="#"></a></li>
                                <li><a class="color3" href="#"></a></li>
                                <li><a class="color4" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                                <li><a class="color12" href="#"></a></li>
                                <li><a class="color13" href="#"></a></li>
                                <li><a class="color14" href="#"></a></li>
                                <li><a class="color15" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                            </ul>
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
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection