
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Social Media</div>

                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center mx-2">
                            @if (!$twitter)
                            <svg style="
                            height: 42px;
                            width: auto;
                            margin: 0px, 5px, 0px, 5px;
                            margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#03A9F4" d="M16 3.539a6.839 6.839 0 0 1-1.89.518 3.262 3.262 0 0 0 1.443-1.813 6.555 6.555 0 0 1-2.08.794 3.28 3.28 0 0 0-5.674 2.243c0 .26.022.51.076.748a9.284 9.284 0 0 1-6.761-3.431 3.285 3.285 0 0 0 1.008 4.384A3.24 3.24 0 0 1 .64 6.578v.036a3.295 3.295 0 0 0 2.628 3.223 3.274 3.274 0 0 1-.86.108 2.9 2.9 0 0 1-.621-.056 3.311 3.311 0 0 0 3.065 2.285 6.59 6.59 0 0 1-4.067 1.399c-.269 0-.527-.012-.785-.045A9.234 9.234 0 0 0 5.032 15c6.036 0 9.336-5 9.336-9.334 0-.145-.005-.285-.012-.424A6.544 6.544 0 0 0 16 3.539z"/></svg>
                                <a href="{{$url}}" class="btnTwitter btn btn-dark">Autenticar</a>
                            @else
                            <svg  style="
                            height: 42px;
                            width: auto;
                            margin: 0px, 5px, 0px, 5px;
                            margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill="#03A9F4" d="M16 3.539a6.839 6.839 0 0 1-1.89.518 3.262 3.262 0 0 0 1.443-1.813 6.555 6.555 0 0 1-2.08.794 3.28 3.28 0 0 0-5.674 2.243c0 .26.022.51.076.748a9.284 9.284 0 0 1-6.761-3.431 3.285 3.285 0 0 0 1.008 4.384A3.24 3.24 0 0 1 .64 6.578v.036a3.295 3.295 0 0 0 2.628 3.223 3.274 3.274 0 0 1-.86.108 2.9 2.9 0 0 1-.621-.056 3.311 3.311 0 0 0 3.065 2.285 6.59 6.59 0 0 1-4.067 1.399c-.269 0-.527-.012-.785-.045A9.234 9.234 0 0 0 5.032 15c6.036 0 9.336-5 9.336-9.334 0-.145-.005-.285-.012-.424A6.544 6.544 0 0 0 16 3.539z"/></svg>
                                <button href="#" class="btnTwitter btn btn-success" disabled>Autenticado</button>
                            @endif
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

                                       <td>Twitter</td>

                                        <td>
                                            {{$item->type_publish}}
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
