@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8" >
        <div class="card">
            <div class="card-header">{{ __('In line') }}</div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Social Media</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody >
                            @php
                                {{$count = 1;}}
                            @endphp
                            @foreach($posts as $item)
                                @if ($item->type_publish == "In-line" && $item->status == "Pending")
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td><a href="/post-information/{{$item->id}}" style="  a: link;
                                        text-decoration: none;
                                    "> {{$item->title}}</a></td>

                                <td>Twitter</td>

                                    <td>
                                        {{$item->type_publish}}
                                    </td>

                                    <td>Pending</td>
                                    <td>
                                        <a href="/publish/inline/{{$item->id}}" class="btn btn-success">Publish</a>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center pt-2">
    <div class="col-md-8" >
        <div class="card">
            <div class="card-header">{{ __('History') }}</div>
            <div class="card-body">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Social Media</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody >
                            @php
                                {{$count = 1;}}
                            @endphp
                            @foreach($posts as $item)
                                @if ($item->type_publish == "In-line" && $item->status == "Published")
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td><a href="/post-information/{{$item->id}}" style="  a: link;
                                        text-decoration: none;
                                    "> {{$item->title}}</a></td>

                                <td>Twitter</td>

                                    <td>
                                        {{$item->type_publish}}
                                    </td>

                                    <td>{{$item->status}}</td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
