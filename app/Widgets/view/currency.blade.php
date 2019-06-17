@if($currencies)
    <select id="currency" tabindex="4" class="dropdown drop">
        <option value="" class="label">{{$activeCurrency->code}}</option>
        @foreach($currencies as $currency)
            @if($currency->code != $activeCurrency->code)
                <option value="{{$currency->code}}">{{$currency->code}}</option>
            @endif
        @endforeach
    </select>
@endif