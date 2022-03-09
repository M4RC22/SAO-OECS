<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('plugins/fontawesome-free/css/all.min.css')}}">

<body class="d-flex align-items-center" style="height:100vh">
    <div class="container mt-6 d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-center flex-wrap flex-column bg-warning">
                    <div class="col d-flex justify-content-center">
                        <img src="img/apc_logo.png" class="p-3" style="max-height:150px"/>
                    </div>
                    <div class="col">
                        <h4 class="text-center" style="font-weight:900; color:#fff;">SAO Online Events Creation System</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="row mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row py-3 d-flex justify-content-between">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt pr-2"></i> {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


