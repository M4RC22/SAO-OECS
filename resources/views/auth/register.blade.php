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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- First Name -->
                            <div class="row mb-3">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}"  autocomplete="firstName" autofocus>

                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Middle Name -->
                            <div class="row mb-3">
                                <label for="middleName" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class="col-md-6">
                                    <input id="middleName" type="text" class="form-control @error('Middle Name') is-invalid @enderror" name="middleName" value="{{ old('middleName') }}"  autocomplete="middleName" autofocus>

                                    @error('middleName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Last  Name -->
                            <div class="row mb-3">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}"  autocomplete="lastName" autofocus>

                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="row mb-3">
                                <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('Phone Number') }}"  autocomplete="phoneNumber" maxlength="11" autofocus>

                                    @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
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




