@if(\Illuminate\Support\Facades\Session::has('flash_message'))
    <div class="alert alert-success">
        <p>{{\Illuminate\Support\Facades\Session::get('flash_message')}}</p>
        <a class="btn btn-success" href="{{$_SERVER['REQUEST_URI']}}">OK</a>
    </div>
@endif