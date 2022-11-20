<?php
date_default_timezone_set('America/Costa_Rica');
$date = date('d-m-Y h:i:s: a');
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form method="POST" action="/edit-post/{{ $post['id'] }}">
                            @csrf
                            <input type="hidden" id="type_publish" value="{{ $post['type_publish_id'] }}">
                            <!--Title-->
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title:') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ $post['title'] }}" required autocomplete="title" autofocus disabled>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--Comment-->
                            <div class="row mb-3">
                                <label for="comment"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Comment:') }}</label>
                                <div class="col-md-6">
                                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" cols="30"
                                        rows="10" required>{{ $post['comment'] }}</textarea>
                                </div>
                            </div>
                            <!--Type-->
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Type:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="type" onchange="getValueSelect()"
                                        onpageshow="getValueSelect();" required>
                                        @if ($post['type_publish_id'] == 1)
                                            <option selected value="1">Direct</option>
                                            <option value="2">In line</option>
                                            <option value="3">Programmed</option>
                                        @elseif ($post['type_publish_id'] == 2)
                                            <option value="1">Direct</option>
                                            <option selected value="2">In line</option>
                                            <option value="3">Programmed</option>
                                        @else
                                            <option value="1">Direct</option>
                                            <option value="2">In line</option>
                                            <option selected value="3">Programmed</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!--Date-->
                            <div id="divDate" style="display:none" class="row mb-3">
                                <label id="labelDate" for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date to publish:') }}</label>
                                <div class="col-md-6">
                                    <input type="datetime-local" id="date" class="form-control" name="datePublish"
                                        max="2040-06-14T00:00" value="{{ $post['date'] }}">
                                </div>
                            </div>

                            <!--Social Media-->
                            <div class="row mb-3">
                                <label for="socialmedia"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Social Media:') }}</label>
                                <div class="col-md-6">
                                    @if ($post['Facebook'] == 1)
                                        <input name="cbFacebook" class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckIndeterminate" checked>
                                    @else
                                        <input name="cbFacebook" class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckIndeterminate">
                                    @endif
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Facebook
                                    </label>
                                </div>

                                <div class="row mb-0">
                                    <label for="socialmedia" class="col-md-4 col-form-label text-md-end"></label>
                                    <div class="col-md-6" style="margin-left:7px">
                                        @if ($post['Instagram'] == 1)
                                            <input name="cbInstagram" class="form-check-input" type="checkbox"
                                                value="1" id="flexCheckIndeterminate" checked>
                                        @else
                                            <input name="cbInstagram" class="form-check-input" type="checkbox"
                                                value="1" id="flexCheckIndeterminate">
                                        @endif
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Instagram
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="socialmedia" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    @if ($post['Twitter'] == 1)
                                        <input name="cbTwitter" class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckIndeterminate" checked>
                                    @else
                                        <input name="cbTwitter" class="form-check-input" type="checkbox" value="1"
                                            id="flexCheckIndeterminate">
                                    @endif

                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Twitter
                                    </label>
                                </div>
                            </div>


                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Edit Post') }}
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

<script>
    /*
        Funcion para obtener el valor del tipo de publicar el post
        si es 3, se muestra un espacio para agregar la fecha y hora
        que desea programar la publicacion. Si no, se esconde el formulario.
    */
    function getValueSelect() {
        let valor = document.getElementById("type").value;
        let divDate = document.getElementById('divDate');

        if (valor == 3) {
            divDate.style.display = 'flex';
        } else {
            divDate.style.display = 'none';
        }
    }

    window.addEventListener('load', function() {
        let valor = document.getElementById("type_publish").value;
        let divDate = document.getElementById('divDate');
        console.log(valor);
        if (valor == 3) {
            divDate.style.display = 'flex';
        } else {
            divDate.style.display = 'none';
        }
    });
</script>
