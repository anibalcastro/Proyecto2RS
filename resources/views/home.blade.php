<?php
use App\Http\Controllers\TwitterController as TwitterController;
use App\Http\Controllers\UserController as UserController;
$socialMedia = "";
session_start();
?>
@extends('layouts.app')
@section('content')
<div class="container">
    @include('components.flash')
    @Auth
        @php
            $url = TwitterController::twitterAuthenticate();
            $twitter = UserController::validateAuthenticationTwitter();
        @endphp
        @include('components.dashboard');
    @else
        @include('components.front');
    @endAuth
</div>
@endsection
