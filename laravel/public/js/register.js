var global_random;
var global_id_check;
//현재날짜
var date;
//input 날짜
var input_birth;

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function checkIt(){
    global_random;

    //정규식
    var idJ = /^[a-z0-9_\-]{5,20}$/;
    var pwJ = /^[A-Za-z0-9!\@\#\$\%\^\&\*]{8,16}$/;
    var markJ = /[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"\s]/gi;
    var num= /^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/;
    var verifyJ= /^[0-9a-zA-Z][0-9a-zA-Z\_\-\.\+]+[0-9a-zA-Z]@[0-9a-zA-Z][0-9a-zA-Z\_\-]*[0-9a-zA-Z](\.[a-zA-Z]{2,6}){1,2}$/;


    //-------------------ID 예외처리
    if($('#id').val()==''){
      $('#id_check').text('필수 정보입니다.');
      $('#id_check').css('color', 'red');
      $("#id").focus();
      return false;
    }
    if(!idJ.test($('#id').val())){
      //2. 정규식 일치X
      $('#id_check').text('5~20자리의 영문 소문자, 숫자와 특수기호 (-),(_)만 사용 가능합니다.');
      $('#id_check').css('color', 'red');
      $("#id").focus();
      return false;
    }
    if(idJ.test($('#id').val())){
      //3. 정규식 일치 o
      $('#id_check').text('휼륭한 아이디네요!');
      $('#id_check').css('color', 'green');
    }
    //id중복
    if(global_id_check>0){
      $('#id_check').text('이미 사용중인 아이디입니다.');
      $('#id_check').css('color', 'red');
      $("#id").focus();
      return false;
    }
   

    }
    //-------------------PW 예외처리
    //2. 공백
    if($("#password").val()==''){
      $('#pw_check').text('비밀번호를 입력해주세요.');
      $('#pw_check').css('color', 'red');
      $("#password").focus();
      return false;
    }
    //3. 정규식 일치 X
    if(!pwJ.test($("#password").val())){
      $('#pw_check').text('8~16자리의 영문 대소문자, 숫자와 특수기호만 사용가능합니다. ');
      $('#pw_check').css('color', 'red');
      $("#password").focus();
      return false;
    }
    //-------------------PW 확인 예외처리
    //1. 공백이 아닐 경우
    if($("#password").val() != "" || $("#check").val() != "")
    {
      if($("#password").val() != $("#pw_pw").val()){
        $('#re_pw_check').text('비밀번호가 일치하지 않습니다.');
        $('#re_pw_check').css('color', 'red');
        $("#check").focus();
        return false;
      }
    }
    //2. 공백일 경우
    if($("#password").val() == "" || $("#check").val() == ""){
      $('#re_pw_check').text('필수 정보입니다.');
      $('#re_pw_check').css('color', 'red');
      $("#check").focus();
      return false;
    }
    //-------------------이름
    //1. 공백 -- 빈칸
    if($('#name').val() == ""){
      $('#name_check').text("필수 정보입니다.");
      $('#name_check').css('color', 'red');
      $("#name").focus();
      return false;
    }
    if($('#name').val() !== ""){
      $('#name_check').text("");
      $('#name_check').css('color', 'red'); 
    }
    //2. 공백X 특수기호, 스페이스바 사용
    if(markJ.test($('#name').val())){
      $('#name_check').text("한글과 영문 대 소문자를 사용하세요.(특수기호, 공백 사용불가)");
      $('#name_check').css('color', 'red');
      $("#name").focus();
      return false;
    }
    if($('#email').val()==""){
      $('#email_check').text("필수 정보입니다.");
      $('#email_check').css('color', 'red');
      $("#email").focus();
      return false;
    }
        //정규식 일치xx
    if(!verifyJ.test($('#email').val())){
      $('#email_check').text("알맞는 이메일 유형이 아닙니다.");
      $('#email_check').css('color', 'red');
      $("#email").focus();
      return false;
    }
    if($('#c_email').val()!==""){
      $('#email_check').text("");
      $('#email_check').css('color', 'red');
    }
    if($('#nickname').val() == ""){
      $('#nickname_check').text("필수 정보입니다.");
      $('#nickname_check').css('color', 'red');
      $("#nickname_check").focus();
      return false;
    }
    if($('#nickname').val() !== ""){
      $('#nickname_check').text("");
      $('#nickname_check').css('color', 'red');
    }
    
    //-------------------핸드폰 인증
    if($('#c_num').val()==""){
      $("#phonenum_check").text("필수 정보입니다.");
      $('#phonenum_check').css('color', 'red');
      $("#c_num").focus();
      return false;
    }
    if(!num.test($('#c_num').val())){
      $('#phonenum_check').text('형식에 맞지 않는 번호입니다.');
      $('#phonenum_check').css('color', 'red');
      $("#c_num").focus();
      return false;
    }

    //-------------------이메일


    //-------------------이메일 인증
    //인증 칸 공백
    // if($('#verify_num').val() == ""){
    //   $('#email_check').text("인증이 필요합니다.");
    //   $('#email_check').css('color', 'red');
    //   $("#verify_num").focus();
    //   return false;
    // }
    // if(global_random != $('#verify_num').val()){
    //   $('#email_check').text("인증번호를 다시 확인해주세요.");
    //   $('#email_check').css('color', 'red');
    //   $("#verify_num").focus();
    //   return false;
    // }

    else{
      alert('가입이완료되었습니다.');
      return redirect('/');
    }
  }

  $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

