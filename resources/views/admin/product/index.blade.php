@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        <div class="ckeck-top heading">
            <h2>{{__('Products')}}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route('admin.search.product')}}" method="GET" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="{{__('Search product')}}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>{{__('Id')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Brand')}}</th>
                    <th>{{__('Image')}}</th>
                    <th>{{__('Content')}}</th>
                    <th>{{__('Price')}}</th>
                    <th>{{__('Old Price')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Hit')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($products))
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                <a href="{{route('admin.brands.edit', [
                                    'id' => $product->brand_id])}}">{{$product->brand->title}}</a>
                            </td>
                            <td>
                                {{$product->img}}
                            </td>
                            <td>
                                {{$product->content}}
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                            <td>
                                {{$product->old_price}}
                            </td>
                            <td>
                                @if($product->status)
                                    <span class="text-success">{{__('Available')}}</span>
                                @else
                                    <span class="text-danger">{{__('Not available')}}</span>
                                @endif
                            </td>
                            <td>
                                @if($product->hit)
                                    <span class="text-success">{{__('True')}}</span>
                                @else
                                    <span class="text-danger">{{__('False')}}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.products.edit', [
                                    'id' => $product->id])}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.products.delete', [
                                    'id' => $product->id])}}">
                                    @csrf
                                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="not-found-box">
                        <p>{{__('Not found any products')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
                    </div>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$products->links()}}
        </div>


        <div class="row justify-content-center">
            <div class="col-md-6">
                <form enctype="multipart/form-data" method="POST" action="{{route('admin.products.create')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="{{__('Title')}}" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="brand_id" required>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="alias" type="text" placeholder="{{__('Alias')}}" required>
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="{{__('Content')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="price" type="text" placeholder="{{__('Price')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="old_price" type="text" placeholder="{{__('Old price')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="keywords" type="text" placeholder="{{__('Keywords')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="description" type="text" placeholder="{{__('Description')}}">
                    </div>

                    <div class="form-group">
                        <label class="custom-file-label" for="validatedCustomFile">{{__('Choose image')}}</label>
                        <input type="file" class="custom-file-input form-control" name="img" id="validatedCustomFile" required/>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="{{1}}">{{__('Available')}}</option>
                            <option value="{{0}}">{{__('Not available')}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="hit">
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

                    <input type="submit" value="{{__('Add')}}" class="btn btn-primary">
                    <input type="reset" value="{{__('Clear')}}" class="btn btn-secondary">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <script src="{{asset('js/admin/searchProducts.js')}}"></script>
@endsection