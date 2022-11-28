<style>
    .tags {
        list-style: none;
        margin: 0;
        overflow: hidden;
        padding: 0;
    }

    .tags li {
        float: left;
    }

    .tag {
        background: rgb(23, 22, 22);
        border-radius: 3px 0 0 3px;
        color: rgb(255, 255, 255);
        display: inline-block;
        height: 26px;
        line-height: 26px;
        padding: 0 20px 0 23px;
        position: relative;
        margin: 0 10px 10px 0;
        text-decoration: none;
        -webkit-transition: color 0.2s;
    }

    .tag::before {
        background: #fff;
        border-radius: 10px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
        content: '';
        height: 6px;
        left: 10px;
        position: absolute;
        width: 6px;
        top: 10px;
    }

    .tag::after {
        background: #fff;
        border-bottom: 13px solid transparent;
        border-left: 10px solid rgb(23, 22, 22);
        border-top: 13px solid transparent;
        content: '';
        position: absolute;
        right: 0;
        top: 0;
    }

    .tag:hover {
        background-color: crimson;
        color: white;
    }

    .tag:hover::after {
        border-left-color: crimson;
    }
</style>



@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Post Information</strong> </h4>
                </div>

                <div class="card-body">

                    <div class="">
                        <h4>Comment:</h4>
                        <p>{{ $post->comment }}</p>
                    </div>

                    <hr />

                    <div>
                        <h4>Social Media:</h4>
                        <ul class="tags">
                            <li>
                                <p class="tag">Twitter</p>
                            </li>
                        </ul>
                    </div>

                    <hr />

                    <div>
                        <h4>Publication date:</h4>
                        <p>{{ $post->date }}</p>

                    </div>

                    <hr />

                    <a href="/" class="btn btn-dark">Go back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
