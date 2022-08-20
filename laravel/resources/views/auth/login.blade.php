@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}
                <div class="login-container">
                <div class="login-box">
                    <form method="POST" class="login-form" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <h1 class="logo">LogIn</h1>
                            {{-- <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('userid') }}</label> --}}

                            <div class="textForm">
                                <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required autocomplete="userid" autofocus placeholder="아이디">

                                {{-- @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                            <div class="textForm">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="비밀번호">
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        
                                <button type="submit" class="login_bt" value="로그인">
                                    {{ __('Login') }}
                                </button>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                </div>
                </div>
            {{-- </div>
        </div>
    </div>
</div> --}}
@endsection
