<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/register.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register" method="POST" class="joinForm" onsubmit="return checkIt();">
                 @csrf                                                                              
        <h2>회원가입</h2>
        <div class="textForm">
          <input name="userid" type="text" id="userid" class="userid" placeholder="아이디">
          </input>
        </div>
        <div class="check_div" id="id_check" value=""></div>
        <div class="textForm">
          <input name="password" type="password" id="password" class="password" placeholder="비밀번호">
        </div>
        <div class="check_div" id="pw_check" value=""></div>
         <div class="textForm">
          <input name="loginPwConfirm" id="pw_pw" type="password" class="password" placeholder="비밀번호 확인">
        </div>
        <div class="check_div" id="re_pw_check" value=""></div>
        <div class="textForm">
          <input name="name" type="name" id="name" class="name" placeholder="이름">
        </div>
        <div class="check_div" id="name_check" value=""></div>
         <div class="textForm">
          <input name="email" id="email" type="email" class="email" placeholder="이메일">
        </div>
        <div class="check_div" id="email_check" value=""></div>
        <div class="textForm">
          <input name="nickname" id="nickname" type="text" class="nickname" placeholder="닉네임">
        </div>
        <div class="check_div" id="nickname_check" value=""></div>
        <div class="textForm">
          <input name="c_num" id="c_num" type="text" class="cellphoneNo" placeholder="전화번호">
        </div>
        <div class="check_div" id="phonenum_check" value=""></div>
        <input type="submit" class="btn" value="J O I N"/>
      </form>
</body>
</html>

<script type="text/javascript" src="js/register.js" charset="utf-8"></script>


