@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="ckeck-top heading">
            <h2>{{__('Brand')}} : {{$brand->title}}</h2>
        </div>
        <div class="justify-content-center col-md-5">
            <form method="POST" action="{{route('admin.brands.update',
                ['id' => $brand->id])}}">
                @csrf
                <div class="form-group">
                    <input class="form-control" name="title" type="text"
                           value="{{$brand->title}}" placeholder="{{__('title')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="alias" type="text"
                           value="{{$brand->alias}}" placeholder="{{__('alias')}}" required>
                </div>
                <div class="form-group">
                    <label class="custom-file-label" for="validatedCustomFile">Выберите изображение</label>
                    <input type="file" class="custom-file-input form-control"
                           name="img" id="validatedCustomFile">
                </div>
                <div class="form-group">
                    <input class="form-control" name="description" type="text"
                           value="{{$brand->description}}" placeholder="{{__('description')}}">
                </div>
                <input type="submit" value="{{__('Edit')}}" class="btn btn-primary">
                <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection