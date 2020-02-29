@extends('layouts.app')

@section('content')
    <div class="container home-container">
        <!--<h1>Welcome <span style="color: #FFCB9A;">{{Auth::User()->sur_name}}</span></h1>-->
        <div class="welcome-text">
            <h1 class="hello"><span style="font-size: 50px; color: #D1EBE2; font-family:consolas">hi</span>{{Auth::user()->sur_name}}</h1>
        </div>
   
    <div class="welcome-text-2">
        <h3 class="hello-3">Thanks For signingup, otherwise hold on as we set up things for you</h3>
        <br>
    </div>
    <div class="welcome-text-3">
        <h3>Click At The Top right To Logout</h3>
    </div>
    </div>
@endsection
