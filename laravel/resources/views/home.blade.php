<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
    button {
        margin: 20px;
    }
    
    .w-btn {
        position: relative;
        border: none;
        display: inline-block;
        padding: 15px 30px;
        border-radius: 15px;
        font-family: "paybooc-Light", sans-serif;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        font-weight: 600;
        transition: 0.25s;
    }
    
    .w-btn-outline {
        position: relative;
        padding: 15px 30px;
        border-radius: 15px;
        font-family: "paybooc-Light", sans-serif;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        text-decoration: none;
        font-weight: 600;
        transition: 0.25s;
    }
    
    .w-btn-indigo {
        background-color: aliceblue;
        color: #1e6b7b;
    }
    
    .w-btn-indigo-outline {
        border: 3px solid aliceblue;
        color: #1e6b7b;
    }
    
    .w-btn-indigo-outline:hover {
        color: #1e6b7b;
      </style>
</head>
<body>
    @include('layouts.navigation')
  
                <div class="login-box">
                            <div class="textForm">
                                회원가입이 완료되었습니다.
                            </div>
                            <button class="w-btn w-btn-indigo" type="button" onclick = "location.href = '/' " >
                                홈으로 이동
                            </button>
                        
                </div>
</body>
</html>

