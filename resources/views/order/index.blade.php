@extends('layouts.layout')

@section('title', "Orders")

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        @if(count($orders))
        <div class="table-responsive">
            @foreach($orders as $order)
            <table class="table table-hover table-striped order-box">
                <thead>
                    <tr>
                        <th colspan="3">{{__('ID Order')}} : {{$order->id}}</th>
                        <th>
                            <a href="{{route('order.delete', [
                                'id' => $order->id])}}" class="btn btn-danger">
                                {{__('Cancel')}}
                            </a>
                        </th>
                    </tr>
                    <tr>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Quantity')}}</th>
                        <th class="text-right">{{__('Price')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product.show', [
                                'alias' => $product->alias])}}">
                                {{$product->title}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('product.show', ['alias' => $product->alias])}}">
                                <img class="cart-img" src="{{asset('/images/'.$product->img)}}" alt="{{$product->img}}">
                            </a>
                        </td>
                        <td>{{$product->pivot->qty}}</td>
                        <td class="text-right">{{$order->currency->symbol}} {{$product->pivot->price}}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td>{{__('Full price')}}</td>
                        <td colspan="4" class="text-right">
                            {{$order->currency->symbol}}
                            {{$order->price}}
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('Note')}}</td>
                        <td colspan="4" class="text-right">
                            {{$order->note}}
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('Date')}}</td>
                        <td colspan="4" class="text-right">
                            {{$order->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <td>{{__('Status')}}</td>
                        <td colspan="4" class="text-right">
                            @if($order->status)
                                <span class="text-warning">{{__('Processing')}}</span>
                            @else
                                <span class="text-success">{{__('Complete')}}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
        <div class="pagination">
            {{$orders->links()}}
        </div>
        @else
            <div class="not-found-box">
                <p>{{__('Not found any orders')}}</p>
                <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
            </div>
        @endif
    </div>
@endsection
