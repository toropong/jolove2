<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>작품등록</title>
    <link href="css/image.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
<form action="{{url('image')}}" method="POST"  class="qwe" name="worksform" id="worksform" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return check();" >
    {{csrf_field()}}
    <input type="hidden" name="no" id="no" value="">
    <div class="a">
        <label for="inputLastName1" class="form-label">작품이름</label>
        <div class="input-group"> <span> </span>
            <input type="text" name="title" value="" id="title" placeholder="작품명">
        </div>
        <div class="title_blank" id="title_blank"></div>
    </div>
    <div class="b">
        <label for="inputLastName1" class="form-label">내용</label>
        <div>
        <textarea name="cont" value="" id="cont"></textarea>
        </div>
        <div class="content_blank" id="content_blank"></div>
    </div>
        <div class="preview-wrap">
            <div class="preview-left">
              <div class="preview">
                <img src="" onerror="this.src=''" id="image-session">
                <div class="preview-image">
                  <!-- 이미지 미리보기 -->
                </div>
              </div>
            </div>
            <div class="preview-right">
              <div class="image-upload">
                {{-- <label for="real-input">사진 업로드</label> --}}
              </div>
            </div>
        </div>
          
          {{-- @endforeach --}}
    <input type="file" onchange="checkFile(this);" multiple id="real-input" name="picture" class="image_inputType_file" accept="image*/">
    
    {{-- <form method="POST" onsubmit="return false;" enctype="multipart/form-data"> --}}
    <div class="insert">
      <input type="file" onchange="addFile(this);" name="images" multiple='multiple'  id="subfile" />
          {{-- <label for="file">
            <div class="btn-upload">추가이미지</div>
          </label> --}}
          
          <div class="file-list"></div>
  </div>


    <div class="c">
           <input type="text" name="year" />학년도          
    </div>
    {{-- <div class="postbutton">
        <input type="submit" name="" value="저장" id="save" onclick="save_check()">
        <input type="hidden" value=""  id="close"  >
      </div> --}}
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="" value="저장" id="save"onclick="save_check()">저장</button>
<button type="button" class="btn btn-primary"  data-bs-dismiss="modal" value="창닫기"  id="close"  onclick="window.close()">창닫기</button>
</div>
</form>
</body>
</html>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
      // 이미지 등록관련코드
                            function checkFile(el){
                              $('#image-session').attr('src', '#');
                              var file = el.files;
                              if(file[0].size > 1024 * 1024 * 100){
                                alert('100MB 이하 파일만 등록할 수 있습니다.\n\n' +
                                '현재파일 용량 : ' + (Math.round(file[0].size / 1024 / 1024 * 100) / 100) + 'MB');
                                el.outerHTML = el.outerHTML;
                              }
                              else chk_file_type(el);
                          
                            }
                            function chk_file_type(el) {
                              var file_kind = el.value.lastIndexOf('.');
                              var file_name = el.value.substring(file_kind+1,el.length);
                              var file_type = file_name.toLowerCase();
                              var check_file_type=new Array();
                              check_file_type=['jpg','gif','png','jpeg','bmp','tif'];
                              if(check_file_type.indexOf(file_type)==-1) {
                                alert('이미지 파일만 업로드 가능합니다.');
                                var parent_Obj=el.parentNode;
                                console.log(parent_Obj);
                                var node=parent_Obj.replaceChild(el.cloneNode(true),el);
                                document.getElementById("real-input").value = "";    //초기화를 위한 추가 코드
                                document.getElementById("real-input").select();        //초기화를 위한 추가 코드                                               //일부 브라우저 미지원
                              }
                              else{readURL(el);
                                $("#real-input").change(function(){
                                  readURL(this);
                                });
                              }
                            }
                            // 사진을 올릴때마다 파일을 새로 변경시켜주는 함수입니다.
                            function readURL(el) {
                              if (el.files && el.files[0]) {
                                var reader = new FileReader();
                                // 이미지 미리보기해주는 jquery
                                reader.onload = function (e) {
                                  $('#image-session').attr('src', e.target.result);
                                }
                          
                                reader.readAsDataURL(el.files[0]);
                              }
                            }
                            function check(){
                              if($('#real-input').val()==""){
                                $('#real-input').focus();
                                alert('사진을 업로드 해주세요');
                                return false;
                              }
                            }
                            function save_check(){
                                var title = $('#title');
                                var content = $('#cont');
                                var title_cont = title.val();
                                var content_cont = content.val();
                        
                                if (title_cont == "") {
                                    $('#title_blank')
                                        .text("제목을 입력해주세요.")
                                        .css('color', 'red');
                                    title_cont.focus();
                                    return false;
                                } 
                                if (content_cont == "") {
                                    $('#content_blank')
                                        .text("내용을 입력해주세요.")
                                        .css('color', 'red');
                                    content_cont.focus();
                                    return false;
                                
                            }
                          }

                          var fileNo = 0;
                          var filesArr = new Array();

/* 첨부파일 추가 */
function addFile(obj){

    var maxFileCnt = 5;   // 첨부파일 최대 개수
    var attFileCnt = document.querySelectorAll('.filebox').length;    // 기존 추가된 첨부파일 개수
    var remainFileCnt = maxFileCnt - attFileCnt;    // 추가로 첨부가능한 개수
    var curFileCnt = obj.files.length;  // 현재 선택된 첨부파일 개수
    var file = document.getElementById("subfile");
    for(var i = 0; i<maxFileCnt; i++){
      $('input[name="images[i]"].'.file)
    }
    // 첨부파일 개수 확인
    if (curFileCnt > remainFileCnt) {
        alert("첨부파일은 최대 " + maxFileCnt + "개 까지 첨부 가능합니다.");
    }

    for (var i = 0; i < Math.min(curFileCnt, remainFileCnt); i++) {

        const file = obj.files[i];

        // 첨부파일 검증
        if (validation(file)) {
            // 파일 배열에 담기
            var reader = new FileReader();
            reader.onload = function () {
                filesArr.push(file);
            };
            reader.readAsDataURL(file)

            // 목록 추가
            let htmlData = '';
            htmlData += '<div id="file' + fileNo + '" class="filebox">';
            htmlData += '   <p class="name">' + file.name + '</p>';
            htmlData += '   <a class="delete" onclick="deleteFile(' + fileNo + ');"><i class="far fa-minus-square"></i></a>';
            htmlData += '</div>';
            
            $('.file-list').append(htmlData);
            fileNo++;
        } else {
            continue;
        }
    }
    // 초기화
    // document.querySelector("input[type=file]").value = "";
}

/* 첨부파일 검증 */
function validation(obj){
    const fileTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/bmp', 'image/tif'];
    if (obj.name.length > 100) {
        alert("파일명이 100자 이상인 파일은 제외되었습니다.");
        return false;
    } else if (obj.size > (100 * 1024 * 1024)) {
        alert("최대 파일 용량인 100MB를 초과한 파일은 제외되었습니다.");
        return false;
    } else if (obj.name.lastIndexOf('.') == -1) {
        alert("확장자가 없는 파일은 제외되었습니다.");
        return false;
    } else if (!fileTypes.includes(obj.type)) {
        alert("이미지 파일만 등록 가능합니다.");
        return false;
    } else {
        return true;
    }
}
function submitForm() {
    // 폼데이터 담기
    var form = document.querySelector("form");
    var formData = new FormData(form);
    for (var i = 0; i < filesArr.length; i++) {
        // 삭제되지 않은 파일만 폼데이터에 담기
        if (!filesArr[i].is_delete) {
            formData.append("attach_file", filesArr[i]);
        }
    }
  }
/* 첨부파일 삭제 */
function deleteFile(num) {
    document.querySelector("#file" + num).remove();
    filesArr[num].is_delete = true;
}
                        </script>