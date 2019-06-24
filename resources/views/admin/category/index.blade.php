@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        <div class="ckeck-top heading">
            <h2>{{__('Categories')}}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{route('admin.categories.create')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="{{__('title')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="alias" type="text" placeholder="{{__('alias')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="keywords" type="text" placeholder="{{__('keywords')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="description" type="text" placeholder="{{__('description')}}">
                    </div>
                    <input type="submit" value="{{__('Add')}}" class="btn btn-primary">
                    <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>{{__('Id')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Alias')}}</th>
                    <th>{{__('Keywords')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Edit')}}</th>
                    <th>{{__('Delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories))
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->id}}
                            </td>
                            <td>
                                {{$category->title}}
                            </td>
                            <td>
                                <a href="{{route('admin.products.category')}}">{{$category->alias}}</a>
                            </td>
                            <td>
                                {{$category->keywords}}
                            </td>
                            <td>
                                {{$category->description}}
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.categories.edit', [
                                    'id' => $category->id])}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.categories.delete', [
                                    'id' => $category->id])}}">
                                    @csrf
                                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="not-found-box">
                        <p>{{__('Not found any categories')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
                    </div>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$categories->links()}}
        </div>
        <div class="clearfix"></div>
    </div>
@endsection