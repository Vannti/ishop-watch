@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="ckeck-top heading">
            <h2>{{__('Product')}} : {{$product->title}}</h2>
        </div>
        <div class="justify-content-center col-md-5">
            <form method="POST" action="{{route('admin.products.update',
                ['id' => $product->id])}}">
                @csrf

                <div class="form-group">
                    <input class="form-control" name="title" type="text" value="{{$product->title}}" placeholder="{{__('Title')}}" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="brand_id" value="{{$product->brand_id}}" required>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" name="alias" type="text" value="{{$product->alias}}" placeholder="{{__('Alias')}}">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" value="{{$product->content}}" placeholder="{{__('Content')}}"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control" name="price" type="text" value="{{$product->price}}" placeholder="{{__('Price')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="old_price" type="text" value="{{$product->old_price}}" placeholder="{{__('Old price')}}">
                </div>
                <div class="form-group">
                    <input class="form-control" name="keywords" type="text" value="{{$product->keywords}}" placeholder="{{__('Keywords')}}">
                </div>
                <div class="form-group">
                    <input class="form-control" name="description" type="text" value="{{$product->description}}" placeholder="{{__('Description')}}">
                </div>

                <div class="form-group">
                    <label class="custom-file-label" for="validatedCustomFile">{{__('Choose image')}}</label>
                    <input type="file" class="custom-file-input form-control" name="img" id="validatedCustomFile"/>
                </div>

                <div class="form-group">
                    <select class="form-control" name="status" required>
                        <option value="{{1}}">{{__('Available')}}</option>
                        <option value="{{0}}">{{__('Not available')}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="hit" required>
                        <option value="{{1}}">{{__('Hit')}}</option>
                        <option value="{{0}}">{{__('Not hit')}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <section  class="sky-form">
                        <h4>{{__('Categories')}}</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                @foreach($categories as $category)
                                    <label class="checkbox">
                                        <input type="checkbox" name="categories[]" value="{{$category->id}}">
                                        <i></i>
                                        {{$category->title}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>

                <input type="submit" value="{{__('Edit')}}" class="btn btn-primary">
                <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
            </form>
        </div>
    </div>
@endsection