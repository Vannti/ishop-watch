@extends('layouts.layout')

@section('title', "Orders")

@section('content')
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{{__('Id')}}</th>
                <th>{{__('Product')}}</th>
                <th>{{__('Quantity')}}</th>
                <th>{{__('Price')}}</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($_SESSION['cart'] as $id => $item)
                <tr>
                    <td>
                        <a href="{{route('product.show', ['alias' => $item['alias']])}}">
                            <img class="cart-img" src="{{asset('/images/'.$item['img'])}}" alt="{{$item['alias']}}">
                        </a>
                    </td>
                    <td>
                        <a href="{{route('product.show', [
                            'alias' => $item['alias']])}}">
                            {{$item['title']}}
                        </a>
                    </td>
                    <td>{{$item['qty']}}</td>
                    <td>{{$_SESSION['cart.currency']->symbol}} {{$item['price']}}</td>
                    <td>
                        <span data-id="{{$id}}" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>{{__('Full quantity')}}</td>
                <td colspan="4" class="text-right cart-qty">{{$_SESSION['cart.qty']}}</td>
            </tr>
            <tr>
                <td>{{__('Full sum')}}</td>
                <td colspan="4" class="text-right cart-sum">
                    {{$_SESSION['cart.currency']->symbol}}
                    {{$_SESSION['cart.sum']}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection