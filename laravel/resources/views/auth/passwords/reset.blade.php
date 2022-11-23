<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>비밀번호 변경</title>
    {{-- <link href="../css/login.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    
    <style>
        body {
            background-image:#34495e;
          }
          
        
        .login-box {
            position:absolute;
            width:400px;
            height:400px;
            padding: 30px, 20px;
            background-color:#FFFFFF;
            text-align:center;
            top:40%;
            left:50%;
            transform: 
            translate(-50%,-50%);
          border-radius: 15px;
        }
        
        .login-box ul{
            width: 100%;
            text-align: right; /* 글자를 오른쪽으로 처리 */
            margin-bottom: 20px;
        }
        .login-box li{
            display: inline-block;
            height: 12px; line-height: 12px;
        }
        
         .login-box li:last-child{
            border-left: 1px solid #333;
            padding-left: 10px; 
            margin-left: 4px; 
        }
        .login-box li:first-child{
            border-right: 1px solid #333;
            padding-right: 10px;
            margin-right: 4px; 
        }
        .login-box a{
               /* 글자관련은 보통 최종태그에 줘야 적용 */
               color: #333; font-size: 12px;
        
               /* 현재 위치에서 상대적 이동 */
               position: relative; top: -2px;
        }
        .logo {
            text-align: center;
            margin: 50px;
        }
        
        .login_bt {
            position:relative;
            left:40%;
            transform: translateX(-50%);
            margin-bottom: 40px;
            width:80%;
            height:40px;
            background: linear-gradient(125deg,#81ecec,#6c5ce7,#81ecec);
            background-position: left;
            background-size: 200%;
            color:white;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        .login_bt:hover{
            background-position: right;
        }
        .find_bt{
            position:relative;
            left:20%;
            transform: translateX(-50%);
            margin-bottom: 40px;
            width:40%;
            height:40px;
            background: linear-gradient(125deg,#81ecec,#6c5ce7,#81ecec);
            background-position: left;
            background-size: 200%;
            color:white;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        .find_bt:hover{
            background-position: right;
        }
        .find_bt2{
            position:relative;
            left:20%;
            transform: translateX(-50%);
            margin-bottom: 40px;
            width:40%;
            height:40px;
            background: linear-gradient(125deg,#81ecec,#6c5ce7,#81ecec);
            background-position: left;
            background-size: 200%;
            color:white;
            font-weight: bold;
            border:none;
            cursor:pointer;
            transition: 0.4s;
            display:inline;
        }
        .find_bt2:hover{
            background-position: right;
        }
        .login_blank{
            padding: 20px;
        }
        
        .textForm {
            border-bottom: 2px solid #adadad;
            margin: 30px;
            padding: 10px 10px;
        }
        .id {
            width: 100%;
            outline:none;
            color: #636e72;
            font-size:16px;
            height:25px;
            background: none;
           border: none;
          }
          
          .pw {
            width: 100%;
            border:none;
            outline:none;
            color: #636e72;
            font-size:16px;
            height:25px;
            background: none;
          }</style>
</head>
<body>
<div class="login-container">
    <div class="login-box" >
                    <form method="POST" action="{{ route('password.update') }}" class="login-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <h3 class="logo">비밀번호 변경</h3>
                            {{-- <div class="textForm"> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus style="display: none">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            {{-- </div> --}}

                        <div class="textForm">새 비밀번호
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="비밀번호" style="    width: 100%;
                                outline:none;
                                color: #636e72;
                                font-size:16px;
                                height:25px;
                                background: none;
                               border: none;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="textForm">비밀번호 확인
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="비밀번호 확인" style="    width: 100%;
                                outline:none;
                                color: #636e72;
                                font-size:16px;
                                height:25px;
                                background: none;
                               border: none;">
                        </div>
                        <div class="btnSearch">
                            <input class="find_bt" type="submit" name="enter" value="변경" >   
                            
                            <input class="find_bt2" type="button" name="enter" value="취소" onClick="history.back()">    
                        </div> 
                    </form>
                </div>
            </div>     
        </body>
