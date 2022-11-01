<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>id찾기</title>
    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    
</head>
<body>
    <div class="login-container">
        <div class="login-box">
        <form action="find" method="post" class="login-form">
            {{csrf_field()}}
            <h3 class="logo">아이디 찾기</h3>
            <div class="textForm">이름
                <input type="text" class="id" name="name" id="find_id" placeholder="이 름">
            </div>
            <div class="textForm">휴대전화
                <input type="text" id="find_phonenum" name="phone_num" class="pw" placeholder="휴대전화번호">
            </div>
            <div id="numblank"></div>
            <br>
               <div class="btnSearch">
                <input class="find_bt" type="submit" name="enter" value="찾기" onClick="search_id()">   
                <input class="find_bt2" type="button" name="enter" value="취소" onClick="history.back()">    
            </div> 
        </form>
        </div>
    </div>     
</body>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script language = "JavaScript">
    function search_id() {
        var findid = document.getElementById("find_id").value;
        var find_phonenum = document.getElementById("find_phonenum").value;
        if(findid ==null || findid ==""){
            $('#numblank').text("이름을 입력해주세요.").css('color','red');
            findid.focus();
            return false;
        }
        if(find_phonenum ==null || find_phonenum ==""){
            $('#numblank').text("번호를 입력해주세요.").css('color','red');
            find_phonenum.focus();
            return false;
        }
    }
    </script>
</html>