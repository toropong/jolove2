<html>
<head>
    <link href="css/register.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('layouts.navigation')
<div class="container">
                    <form method="POST"  class="joinForm" action="{{ route('register') }}">
                        @csrf       
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('회원가입') }}</label>
                            <div class="textForm">
                                <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}" required autocomplete="name" autofocus placeholder="아이디">
                            </div>

                        <div class="textForm">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="이름">       
                        </div>
                            <div class="textForm">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="이메일">
                            </div>
                            <div class="textForm">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="비밀번호">
                            </div>
                            <div class="textForm">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="비밀번호 확인">
                            </div>
                            <div class="textForm">
                                <input id="c_num" type="text" class="form-control @error('c_num') is-invalid @enderror" name="c_num" value="{{ old('c_num') }}" required autocomplete="c_num"  placeholder="전화번호">
                            </div>
                       

                        
                            <div class="textForm">
                                <button type="submit" class="btn">
                                    {{ __('Register') }}
                                </button>
                            
                        </div>
                    </form>
                </div>

</body>
</html>

