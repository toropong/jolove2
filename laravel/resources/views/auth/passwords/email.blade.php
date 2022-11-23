<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>비밀번호변경</title>
    <link href="../css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    
</head>
<body>
<div class="login-container">
    <div class="login-box">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            고객님의 이메일로 비밀번호 변경 링크를 보냈습니다.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="login-form" >
                        @csrf
                        <h3 class="logo">비밀번호변경</h3>
                        <div class="textForm">이메일
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="    width: 100%;
                            outline:none;
                            color: #636e72;
                            font-size:16px;
                            height:25px;
                            background: none;
                           border: none;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        <div id="numblank"></div>
                        <br>
                        <div class="btnSearch">
                            <input class="find_bt" type="submit" name="enter" value="전송" onClick="search_id()">   
                            <input class="find_bt2" type="button" name="enter" value="취소" onClick="history.back()">    
                        </div> 
                    </form>
                </div>
            </body>
            <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
            <script language = "JavaScript">
                function search_id() {
                    var email = document.getElementById("email").value;
                    // var find_phonenum = document.getElementById("find_phonenum").value;
                    if(email ==null || email ==""){
                        $('#numblank').text("이메일을 입력해주세요.").css('color','red');
                        email.focus();
                        return false;
                    }
                }
                </script>
            </html>
