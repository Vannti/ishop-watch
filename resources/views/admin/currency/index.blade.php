@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        <div class="ckeck-top heading">
            <h2>{{__('Currencies')}}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route('admin.search.currency')}}" method="GET" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="{{__('Search code')}}">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{route('admin.currencies.create')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="{{__('title')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="code" type="text" placeholder="{{__('code')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="symbol" type="text" placeholder="{{__('symbol')}}" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="value" type="text" placeholder="{{__('value')}}" required>
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
                    <th>{{__('Code')}}</th>
                    <th>{{__('Symbol')}}</th>
                    <th>{{__('Value')}}</th>
                    <th>{{__('Edit')}}</th>
                    <th>{{__('Delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($currencies))
                    @foreach($currencies as $currency)
                        <tr>
                            <td>
                                {{$currency->id}}
                            </td>
                            <td>
                                {{$currency->title}}
                            </td>
                            <td>
                                {{$currency->code}}
                            </td>
                            <td>
                                {{$currency->symbol}}
                            </td>
                            <td>
                                {{$currency->value}}
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.currencies.edit', [
                                    'id' => $currency->id])}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.currencies.delete', [
                                    'id' => $currency->id])}}">
                                    @csrf
                                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="not-found-box">
                        <p>{{__('Not found any currencies')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
                    </div>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$currencies->links()}}
        </div>
        <div class="clearfix"></div>
    </div>

    <script src="{{asset('js/admin/searchCurrencies.js')}}"></script>
@endsection