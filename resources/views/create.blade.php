@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Post</div>
                    <div class="card-body">
                        <form method="POST" action="/create-post">
                            @csrf

                            <!--Title-->
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title:') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Upload File-->
                            <div class="row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-end">{{__('Upload Image or Video:')}}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept="image/png, image/jpeg, video/*">
                                </div>
                            </div>

                            <!--Comment-->
                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment:') }}</label>

                                <div class="col-md-6">
                                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                            <!--Type-->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Type:') }}</label>

                                <div class="col-md-6">
                                   <select class="form-control" name="type" id="type" onchange="getValueSelect()">                                        
                                        <option value="1">Direct</option>
                                        <option value="2">In line</option>
                                        <option value="3">Programmed</option>
                                   </select>
                                </div>
                            </div>

                            <!--Date-->
                                <div id="divDate" style="display:none" class="row mb-3">
                                        <label id="labelDate" for="date" class="col-md-4 col-form-label text-md-end">{{ __('Select the date:') }}</label>
                                        <div class="col-md-6">
                                            <input type="datetime-local" id="date" class="form-control" name="date" max="2040-06-14T00:00">
                                        </div>
                                </div>
                        
                                
                            <!--Social Media-->
                            <div class="row mb-3">
                                <label for="socialmedia" class="col-md-4 col-form-label text-md-end">{{ __('Social Media') }}</label>

                                <div class="col-md-6">
                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Facebook
                                    </label>

                                    <input class="form-check-input" type="checkbox" value="2" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Instagram
                                    </label>

                                    <input class="form-check-input" type="checkbox" value="4" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Twitter
                                    </label>

                                    <input class="form-check-input" type="checkbox" value="3" id="flexCheckIndeterminate">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        Youtube
                                    </label>
                                </div>

                                <div class="col-md-6">
                                
                                </div>

                                <div class="col-md-6">
                              
                                </div>
                            </div>

                            

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Create Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    function getValueSelect(){
        let valor = document.getElementById("type").value;
        let divDate = document.getElementById('divDate');
        
        if(valor == 3){
            divDate.style.display = 'flex';
        }
        else{
            divDate.style.display = 'none';
        }
    }

</script>