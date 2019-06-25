@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <div class="ckeck-top heading">
            <h2>{{__('User')}} : {{$user->login}}</h2>
        </div>
        <div class="justify-content-center col-md-5">
            <form method="POST" action="{{route('admin.users.update',
                ['id' => $user->id])}}">
                @csrf

                <div class="form-group">
                    <input class="form-control" name="login" type="text" value="{{$user->login}}"
                           placeholder="{{__('Login')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" type="text" value="{{$user->email}}"
                           placeholder="{{__('Email')}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="text" placeholder="{{__('Password')}}" required>
                </div>

                <div class="form-group">
                    <section  class="sky-form">
                        <h4>{{__('Roles')}}</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                @foreach($roles as $role)
                                    <label class="checkbox">
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}">
                                        <i></i>
                                        {{$role->name}}
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