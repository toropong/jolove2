<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    @include('layouts.navigation')
                <div class="login-box">
                    <form method="POST" class="login-form" action="{{ route('login') }}">
                        @csrf

                            <h1 class="logo">LogIn</h1>
                            <div class="textForm">
                                <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required autocomplete="userid" autofocus placeholder="아이디">
                            </div>
                    
                            <div class="textForm">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="비밀번호">
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
                                    <a class="btn btn-link" href="findid">
                                        아이디 /
                                    </a>
                                    <a class="btn btn-link" href=findpw>
                                        비밀번호 찾기 /
                                    </a>
                                    <a class="btn btn-link" href=register>
                                         회원가입
                                    </a>
                                @endif
                    </form>
                </div>

</body>
</html>
            {{-- </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
