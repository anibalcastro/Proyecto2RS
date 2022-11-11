<?php

use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;
$name = Auth::user()->name;   
$email = Auth::user()->email;

?>

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>
                <div class="card-body">
                    <form action="/update/user" method="post">
                        @csrf

                        <input type="hidden" name="id" value="<?=$id?>"/>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Name:')}}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="<?=$name ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Email:')}}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="<?= $email ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{__('Password:')}}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="secretpassword" disabled>
                            </div>
                        </div>

                        <div class=" row mb-2 d-flex">
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Update') }}
                                    </button>                                   
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="/delete/user" method="post">
                        @csrf

                        
                        <input type="hidden" name="id" value="<?=$id?>"/>

                        <div class="row mb-2 d-flex">
                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-danger">
                                        {{ __('Delete Account') }}
                                    </button>  
                            </div>
                        </div>

                    </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

    <div class="row justify-content-center pt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Security</div>
                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Authenticator:')}}</label>

                            <div class="col-md-6">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Generates 2FA') }}
                                    </button>
                            </div>
                        </div>
                </div>
            </div>

        </div>

    </div>

</div>



@endsection