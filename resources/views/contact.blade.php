@extends('layouts.layout')

@section('title', 'Contact')

@section('content')
    <!--contact-start-->
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h2>CONTACT</h2>
            </div>
            <div class="contact-text">
                <div class="col-md-3 contact-left">
                    <div class="address">
                        <h5>Address</h5>
                        <p>The SevGU,
                            <span>Sevastopol,</span>
                            Universitetskaya, 33.</p>
                    </div>
                </div>
                <div class="col-md-9 contact-right">
                    <form action="{{route('contact.add')}}" method="POST">
                        @csrf
                        <input name="name" type="text" placeholder="{{__('Name')}}">
                        <input name="phone" type="text" placeholder="{{__('Phone')}}">
                        <input name="email" type="text"  placeholder="{{__('Email')}}">
                        <textarea name="message" placeholder="{{__('Message')}}" required=""></textarea>
                        <div class="submit-btn">
                            <input type="submit" value="{{__('Submit')}}">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--contact-end-->
    <!--map-start-->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1689.3372057097135!2d33.47541487952091!3d44.59466915600813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1561349761849!5m2!1sru!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!--map-end-->
@endsection