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
                    <div class="card-header">Create New Post</div>
                    <div class="card-body">
                        <form method="POST" action="/create-post" enctype="multipart/form-data">
                            @csrf
                            <!--Title-->
                            <div class="row mb-3">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Title:') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title" autofocus>
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
                                        rows="10" required></textarea>
                                </div>
                            </div>
                            <!--Type-->
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Type:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type" id="type" onchange="getValueSelect()"
                                        required>
                                        <option value="Direct">Direct</option>
                                        <option value="In-line">In line</option>
                                        <option value="Programmed">Programmed</option>
                                    </select>
                                </div>
                            </div>

                            <!--Date-->
                            <div id="divDate" style="display:none" class="row mb-3">
                                <label id="labelDate" for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select the date:') }}</label>
                                <div class="col-md-6">
                                    <input type="datetime-local" id="date" class="form-control" name="datePublish"
                                        max="2040-06-14T00:00">
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Create Post') }}
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

        if (valor == "Programmed") {
            divDate.style.display = 'flex';
        } else {
            divDate.style.display = 'none';
        }
    }
</script>
