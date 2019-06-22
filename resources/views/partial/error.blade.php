@if ($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
        <a class="btn btn-secondary" href="{{$_SERVER['REQUEST_URI']}}">Назад</a>
    </div>
@endif