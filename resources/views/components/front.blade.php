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
