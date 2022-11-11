@extends('layouts.app')

@section('content')
<div class="container">
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

                        <i class="gg-youtube"></i><Button class="btnYoutube btn btn-dark">Conectar</Button>

                        <i class="gg-twitter"></i><button class="btnTwitter btn btn-dark">Conectar</Button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recent Posts</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Social Media</th>
                                <th scope="col">Status</th>
                                <th scope="col">Type</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody >

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Post with my family</td>
                                    <td>Instagram</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    </div> 

                                    <td>
                                        Direct                                    
                                    </td>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td>Post in the university</td>
                                    <td>Twitter</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div> 
                                    </td>
                                    <td>
                                        In line
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                                <th scope="row">3</th>
                                    <td>Post with my partner</td>
                                    <td>Facebook</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div> 
                                    </td>
                                    <td>
                                        Programmed
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">In line Posts</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Social Media</th>
                                <th scope="col">Status</th>
                                <th scope="col">Type</th>
                                <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody >

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Post with my family</td>
                                    <td>Instagram</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">80%</div>
                                    </div> 

                                    <td>
                                        In line                                    
                                    </td>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">2</th>
                                    <td>Post in the university</td>
                                    <td>Twitter</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div> 
                                    </td>
                                    <td>
                                        In line
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                                <th scope="row">3</th>
                                    <td>Post with my partner</td>
                                    <td>Facebook</td>
                                    <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div> 
                                    </td>
                                    <td>
                                        In line
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
