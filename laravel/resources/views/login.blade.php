<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <div class="login-container">
    <div class="login-box">
        <form class="login-form">
            <h1 class="logo">LogIn</h1>
            <div class="textForm">
                <input name="loginId" type="text" class="id" id="login_id" placeholder="아이디">
              </div>
              <div class="textForm">
                <input name="loginPw" type="password" class="pw" id=login_pw placeholder="비밀번호">
            </div>
            <ul>
                <li><a href="#">아이디/비밀번호찾기</a></li>
                <li><a href="register">회원가입</a></li>
              </ul>
              <div class="login_blank" id="login_blank"></div>
            <input class="login_bt" type="button" value="로그인" onclick="login_message()" />
        </form>
        </div>
    </div> 
</body>
 <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script language = "JavaScript">
    function login_message() {
        var username = document.getElementById("login_id").value;
        var password = document.getElementById("login_pw").value;
        if (username == null || username == "") {
            $('#login_blank').text("ID를 입력해주세요.").css('color','red');
            login_id.focus();
            return false;
        }
        if (password == null || password == "") {
            $('#login_blank').text("password를 입력해주세요.").css('color','red');
            login_pw.focus();
            return false;
        }
        alert('Login successful');
        
    } 
</script>

{{-- <script>

    function enterkey() {
        if (window.event.keyCode == 13) {
            login_message();
        }
    }

    function login_message() {
        var login_id = $('#login_id');
        var login_pw = $('#login_pw');
        var logindata_id = login_id.val();
        var logindata_pw = login_pw.val();

        if (logindata_id == "") {
            $('#login_blank')
                .text("ID를 입력해주세요.")
                .css('color', 'red');
            login_id.focus();
            return false;
         } 
         else if ((!(logindata_pw == "")) && (logindata_id == "")) {
            $('#login_blank1').text('');
            console.log(1);
        }
        if (logindata_pw == "") {
            $('#login_blank1')
                .text("Password를 입력해주세요.")
                .css('color', 'red');
            login_pw.focus();
            return false;
        }

        $.ajax({
            type: 'post',
            url: '/login',
            dataType: 'json',
            data: {
                "user_id": logindata_id, //input_id는 key값 컨트롤러에서 사용되는 값, login_id는 value값 var login_id로 선언된 값
                "password": logindata_pw,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                if (!data.success) {
                    $('#login_blank')
                        .text("가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.")
                        .css('color', 'red');
                    $('#login_blank1').text('');
                    login_id.focus();
                } else {
                    alert("환영합니다 " + data.user_name + "님");
                    location.href = "{{ route('main') }}";
                }
            },
            error: function() {
                $('#login_blank')
                    .text("오류가 발생하였습니다.")
                    .css('color', 'red');
            }
        });

        return false;
    }
</script> --}}
 </html>