@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Welcome {{Auth::user()->username}}.</p>
        @if(Auth::user()->role_id==1)
        <p> Please <a href="{{route('list.referrals.points')}}"> Click Here </a>to view referrals and their points</p>
        @endif
        
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection