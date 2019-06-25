@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        <div class="ckeck-top heading">
            <h2>{{__('Brands')}}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route('admin.search.brand')}}" method="GET" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="{{__('Search brand')}}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form enctype="multipart/form-data" method="POST" action="{{route('admin.brands.create')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="{{__('title')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="alias" type="text" placeholder="{{__('alias')}}">
                    </div>
                    <div class="form-group">
                        <label class="custom-file-label" for="validatedCustomFile">{{__('Choose image')}}</label>
                        <input type="file" class="custom-file-input form-control" name="img" id="validatedCustomFile"/>
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
                    <th>{{__('Image')}}</th>
                    <th>{{__('Description')}}</th>
                    <th>{{__('Edit')}}</th>
                    <th>{{__('Delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($brands))
                    @foreach($brands as $brand)
                        <tr>
                            <td>
                                {{$brand->id}}
                            </td>
                            <td>
                                {{$brand->title}}
                            </td>
                            <td>
                                <a href="{{route('admin.products.category')}}">{{$brand->alias}}</a>
                            </td>
                            <td>
                                {{$brand->img}}
                            </td>
                            <td>
                                {{$brand->description}}
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.brands.edit', [
                                    'id' => $brand->id])}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.brands.delete', [
                                    'id' => $brand->id])}}">
                                    @csrf
                                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="not-found-box">
                        <p>{{__('Not found any brands')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
                    </div>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$brands->links()}}
        </div>
        <div class="clearfix"></div>
    </div>

    <script src="{{asset('js/admin/searchBrands.js')}}"></script>
@endsection
