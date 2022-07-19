<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/register.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="doJoin" method="POST" class="joinForm" onsubmit="DoJoinForm__submit(this); return false;">
                                                                                               
        <h2>회원가입</h2>
        <div class="textForm">
          <input name="loginId" type="text" id="id" class="id" placeholder="아이디">
          </input>
        </div>
        <div class="check_div" id="id_check" value=""></div>
        <div class="textForm">
          <input name="loginPw" type="password" id="pw" class="pw" placeholder="비밀번호">
        </div>
        <div class="check_div" id="pw_check" value=""></div>
         <div class="textForm">
          <input name="loginPwConfirm" type="password" class="pw" placeholder="비밀번호 확인">
        </div>
        <div class="check_div" id="re_pw_check" value=""></div>
        <div class="textForm">
          <input name="name" type="name" id="name" class="name" placeholder="이름">
        </div>
        <div class="check_div" id="name_check" value=""></div>
         <div class="textForm">
          <input name="email" id="c_email" type="text" class="email" placeholder="이메일">
        </div>
        <div class="check_div" id="email_check" value=""></div>
        <div class="textForm">
          <input name="nickname" type="text" class="nickname" placeholder="닉네임">
        </div>
        <div class="textForm">
          <input name="cellphoneNo" id="c_num" type="number" class="cellphoneNo" placeholder="전화번호">
        </div>
        <input type="submit" class="btn" value="J O I N"/>
      </form>
</body>
</html>

