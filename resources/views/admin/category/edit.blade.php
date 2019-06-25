@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="ckeck-top heading">
            <h2>{{__('Category')}} : {{$category->title}}</h2>
        </div>
        <div class="justify-content-center col-md-5">
            <form method="POST" action="{{route('admin.categories.update',
                ['id' => $category->id])}}">
                @csrf
                <div class="form-group">
                    <input class="form-control" name="title" type="text"
                           value="{{$category->title}}" placeholder="{{__('title')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="alias" type="text"
                           value="{{$category->alias}}" placeholder="{{__('alias')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="keywords" type="text"
                           value="{{$category->keywords}}" placeholder="{{__('keywords')}}">
                </div>
                <div class="form-group">
                    <input class="form-control" name="description" type="text"
                           value="{{$category->description}}" placeholder="{{__('description')}}">
                </div>
                <input type="submit" value="{{__('Edit')}}" class="btn btn-primary">
                <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection