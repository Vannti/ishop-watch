@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="ckeck-top heading">
            <h2>{{__('Currency')}} : {{$currency->title}}</h2>
        </div>
        <div class="justify-content-center col-md-5">
            <form method="POST" action="{{route('admin.currencies.update',
                ['id' => $currency->id])}}">
                @csrf
                <div class="form-group">
                    <input class="form-control" name="title" type="text"
                           value="{{$currency->title}}" placeholder="{{__('title')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="code" type="text"
                           value="{{$currency->code}}" placeholder="{{__('code')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="symbol" type="text"
                           value="{{$currency->symbol}}" placeholder="{{__('symbol')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="value" type="text"
                           value="{{$currency->value}}" placeholder="{{__('value')}}" required>
                </div>
                <input type="submit" value="{{__('Edit')}}" class="btn btn-primary">
                <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection