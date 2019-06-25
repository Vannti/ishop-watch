@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        @include('partial.error')
        @include('partial.success')
        <div class="ckeck-top heading">
            <h2>{{__('Users')}}</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="{{route('admin.search.user')}}" method="GET" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="{{__('Search login')}}">
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
                    <th>{{__('Login')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Password')}}</th>
                    <th>{{__('Register date')}}</th>
                    <th>{{__('Role')}}</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users))
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                <a href="{{route('admin.orders.user', [
                                    'id' => $user->id])}}">{{$user->login}}</a>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->password}}
                            </td>
                            <td>
                                {{$user->created_at}}
                            </td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.users.edit', [
                                    'id' => $user->id])}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('admin.users.delete', [
                                    'id' => $user->id])}}">
                                    @csrf
                                    <input type="submit" value="{{__('Delete')}}" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="not-found-box">
                        <p>{{__('Not found any users')}}</p>
                        <img src="{{asset('/images/product-not-found.png')}}" alt="orders not found">
                    </div>
                @endif
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{$users->links()}}
        </div>

    </div>

    <script src="{{asset('js/admin/searchUsers.js')}}"></script>
@endsection