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
                        <div class="not-found-box">
                            <p>{{__('Products of your query not found')}}</p>
                            <img src="{{asset('/images/product-not-found.png')}}" alt="product not found">
                        </div>
                    @endif
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection