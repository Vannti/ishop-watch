<ul class="memenu skyblue"><li class="active"><a href="{{route('main')}}">{{__('Main')}}</a></li>
    <li class="grid"><a href="{{route('products')}}">{{__('Products')}}</a>
        <div class="mepanel">
            <div class="row">
                <div class="col1 me-one">
                    <h4>{{__('Categories')}}</h4>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('products.category', [
                                                        'category' => $category->alias])}}">
                                    {{$category->alias}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col1 me-one">
                    <h4>{{__('Popular Brands')}}</h4>
                    <ul>
                        @foreach($brands as $brand)
                            <li>
                                <a href="{{route('products.brand', [
                                                        'brand' => $brand->alias])}}">
                                    {{$brand->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </li>

    <li class="grid"><a href="contact.html">{{__('Contact')}}</a>
    </li>
</ul>