@extends('layouts.app')

@section('content')
<div>
  @auth
  <router-view :user="{{Auth::user()}}"></router-view>
  @endauth
  @guest
  
  @endguest
</div>


@endsection
