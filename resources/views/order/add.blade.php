@extends('layouts.layout')

@section('title', 'Make order')

@section('content')
    <!--start-ckeckout-->
    <div class="ckeckout">
        <div class="container">
            <div class="ckeck-top heading">
                <h2>{{__('Order')}}</h2>
            </div>
            <div class="ckeckout-top">
                <div class="cart-items">
                    <h3>{{__('My Shopping Bag ('.$cart_qty.')')}}</h3>

                    <div class="in-check" >
                        <ul class="unit">
                            <li><span>{{__('Image')}}</span></li>
                            <li><span>{{__('Name')}}</span></li>
                            <li><span>{{__('Quantity')}}</span></li>
                            <li><span>{{__('Price')}}</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @foreach($cart as $id => $item)
                        <ul class="cart-header">
                            <li class="ring-in">
                                <a href="{{route('product.show', ['alias' => $item['alias']])}}" >
                                    <img src="{{asset('/images/'.$item['img'])}}"
                                         class="cart-img" alt="{{$item['alias']}}">
                                </a>
                            </li>
                            <li><span class="name">{{$item['title']}}</span></li>
                            <li><span class="cost">{{$item['qty']}}</span></li>
                            <li><span class="cost">{{$currency->symbol}} {{$item['price']}}</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @endforeach
                        <ul class="cart-header">
                            <li><span class="name">{{__('Full quantity')}}</span></li>
                            <li><span class="cost">{{$cart_qty}}</span></li>
                            <div class="clearfix"> </div>
                        </ul>
                        <ul class="cart-header">
                            <li><span class="name">{{__('Full sum')}}</span></li>
                            <li>
                                <span class="cost">
                                    {{$currency->symbol}}
                                    {{$cart_sum}}
                                </span>
                            </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>

                    <form method="POST" action="{{route('order.makeOrder')}}" role="form">
                        @csrf
                        <textarea name="note" class="form-control" placeholder="{{__('Text note')}}"></textarea>
                        <input type="submit" class="btn btn-default" value="{{__('Make order')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end-ckeckout-->
@endsection