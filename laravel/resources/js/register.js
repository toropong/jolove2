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
    var num= /^[0-9]+$/;
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
    //id중복
    if(global_id_check>0){
      $('#id_check').text('이미 사용중인 아이디입니다.');
      $('#id_check').css('color', 'red');
      $("#id").focus();
      return false;
    }
    //-------------------PW 예외처리
    //2. 공백
    if($("#pw").val()==''){
      $('#pw_check').text('비밀번호를 입력해주세요.');
      $('#pw_check').css('color', 'red');
      $("#pw").focus();
      return false;
    }
    //3. 정규식 일치 X
    if(!pwJ.test($("#pw").val())){
      $('#pw_check').text('8~16자리의 영문 대소문자, 숫자와 특수기호만 사용가능합니다. ');
      $('#pw_check').css('color', 'red');
      $("#pw").focus();
      return false;
    }
    //-------------------PW 확인 예외처리
    //1. 공백이 아닐 경우
    if($("#pw").val() != "" || $("#check").val() != "")
    {
      if($("#pw").val() != $("#check").val()){
        $('#re_pw_check').text('비밀번호가 일치하지 않습니다.');
        $('#re_pw_check').css('color', 'red');
        $("#check").focus();
        return false;
      }
    }
    //2. 공백일 경우
    if($("#pw").val() == "" || $("#check").val() == ""){
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
    //2. 공백X 특수기호, 스페이스바 사용
    if(markJ.test($('#name').val())){
      $('#name_check').text("한글과 영문 대 소문자를 사용하세요.(특수기호, 공백 사용불가)");
      $('#name_check').css('color', 'red');
      $("#name").focus();
      return false;
    }
    //-------------------핸드폰 인증
    if($('#c_tel1').val()=="" || $('#c_tel2').val()==""){
      $("#phonenum_check").text("필수 정보입니다.");
      $('#phonenum_check').css('color', 'red');
      $("#c_tel2").focus();
      return false;
    }
    if($('#c_tel3').val()==""){
      $("#phonenum_check").text("필수 정보입니다.");
      $('#phonenum_check').css('color', 'red');
      $("#c_tel3").focus();
      return false;
    }
    if(!num.test($('#c_tel1').val())||!num.test($('#c_tel2').val())){
      $('#phonenum_check').text('형식에 맞지 않는 번호입니다.');
      $('#phonenum_check').css('color', 'red');
      $("#c_tel2").focus();
      return false;
    }
    if(!num.test($('#c_tel3').val())){
      $('#phonenum_check').text('형식에 맞지 않는 번호입니다.');
      $('#phonenum_check').css('color', 'red');
      $("#c_tel3").focus();
      return false;
    }
    //-------------------핸드폰 인증번호 칸
    if($('#verify_p_num').val() == ""){
      $('#phonenum_check').text("인증이 필요합니다.");
      $('#phonenum_check').css('color', 'red');
      return false;
    }
    if(global_random!=$('#verify_p_num').val()){
      $('#phonenum_check').text("인증번호를 다시 확인해주세요.");
      $('#phonenum_check').css('color', 'red');
      return false;
    }
    //-------------------생년월일(필수는 data는 아니지만 잘못된 값 넣는 것을 방지)
    if(!num.test($('#c_birth_y').val())){
      $("#birth_check").text(' 태어난 년도 4자리를 정확하게 입력하세요.');
      $('#birth_check').css('color', 'red');
      $("#c_birth_y").focus();
      return false;
    }
    if($('#c_birth_m').val()==""){
      $("#birth_check").text('태어난 월을 선택하세요.');
      $('#birth_check').css('color', 'red');
      $("#c_birth_m").focus();
      return false;
    }
    if($('#c_birth_d').val()==""){
      $("#birth_check").text('태어난 일(날짜) 2자리를 정확하게 입력하세요.');
      $('#birth_check').css('color', 'red');
      $("#c_birth_d").focus();
      return false;
    }
    if(!num.test($('#c_birth_d').val())){
      $("#birth_check").text('생년월일을 다시 확인해주세요.');
      $('#birth_check').css('color', 'red');
      $("#c_birth_d").focus();
      return false;
    }
    if($('#c_birth_d').val()>31){
      $("#birth_check").text('생년월일을 다시 확인해주세요.');
      $('#birth_check').css('color', 'red');
      $("#c_birth_d").focus();
      return false;
    }
    if(date<input_birth){
      $("#birth_check").text('미래에서 오셨나요?');
      $('#birth_check').css('color', 'red');
      $("#c_birth_y").focus();
      return false;
    }
    //------------------주소
    if($('#postcode').val() == ""){
      $('#staddress_check').text("필수 정보입니다.");
      $('#staddress_check').css('color', 'red');
      $("#postcode").focus();
      return false;
    }
    if(!num.test($('#postcode').val())){
      $('#staddress_check').text("알맞지 않은 우편번호 입니다.");
      $('#staddress_check').css('color', 'red');
      $("#postcode").focus();
      return false;
    }
    if($('#address').val() == ""){
      $('#staddress_check').text("필수 정보입니다.");
      $('#staddress_check').css('color', 'red');
      $("#address").focus();
      return false;
    }
    if($('#detailAddress').val() == ""){
      $('#staddress_check').text("필수 정보입니다.");
      $('#staddress_check').css('color', 'red');
      $("#detailAddress").focus();
      return false;
    }
    //-------------------이메일
    if($('#c_email').val()==""){
      $('#email_check').text("필수 정보입니다.");
      $('#email_check').css('color', 'red');
      $("#c_email").focus();
      return false;
    }
    //정규식 일치xx
    if(!verifyJ.test($('#c_email').val())){
      $('#email_check').text("알맞는 이메일 유형이 아닙니다.");
      $('#email_check').css('color', 'red');
      $("#c_email").focus();
      return false;
    }

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
      return true;
    }
  }