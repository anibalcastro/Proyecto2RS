<?php
$socialMedia = "";
?>

@extends('layouts.app')
@section('content')
<div class="container">
    @include('components.flash')
    @Auth
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Social Media</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="d-flex justify-content-around align-items-center">
                            <i class="gg-facebook"></i> <Button class="btnFacebook btn btn-dark">Conectar</Button>

                            <i class="gg-instagram"></i><Button class="btnInstagram btn btn-dark">Conectar</Button>

                            <i class="gg-twitter"></i><button class="btnTwitter btn btn-dark">Conectar</Button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (is_countable($posts) && count($posts) >= 1)
            <div class="row justify-content-center pt-2">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">All Posts</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Social Media</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                @php
                                    {{$count = 1;}}
                                @endphp
                                @foreach($posts as $item)
                                    <tr>
                                        <th scope="row">{{$count}}</th>
                                        <td><a href="/post-information/{{$item->id}}" style="  a: link;
                                            text-decoration: none;
                                        "> {{$item->title}}</a></td>

                                    @php
                                        if ($item->Facebook == 1){
                                            $socialMedia .= 'Facebook ';
                                        }

                                        if ($item->Instagram == 1){
                                            $socialMedia .= 'Instagram ';
                                        }

                                        if ($item->Twitter == 1){
                                            $socialMedia .= 'Twitter ';
                                        }

                                    @endphp

                                       <td>{{$socialMedia}}</td>


                                        <td>
                                            @switch($item->type_publish_id)
                                                @case(1)
                                                    <p>Direct</p>
                                                    @break
                                                @endcase
                                                @case(2)
                                                    <p>In Line</p>
                                                    @break
                                                @endcase
                                                @case(3)
                                                    <p>Programmed</p>
                                                    @break
                                                @endcase

                                            @endswitch
                                        </td>
                                        </td>
                                        <td>
                                            <a href="/edit-post/{{$item->id}}" class="btn btn-success">Edit</a>
                                            <a href="/delete-post/{{$item->id}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                        $socialMedia = "";
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>

            @else
            <div class="row justify-content-center pt-2">
                <div class="col-md-8" >
                    <div class="card">
                        <div class="card-header">{{ __('Message') }}</div>
                        <div class="card-body">
                            {{ __('No hay publicaciones registradas...') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        {{ __('You are logged in!') }}
                    @endif
                    {{ __('You need login or register new account') }}
                </div>
            </div>
        </div>
    </div>
    @endAuth
</div>
@endsection
