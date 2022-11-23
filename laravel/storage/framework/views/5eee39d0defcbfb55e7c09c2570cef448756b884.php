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
<form action="<?php echo e(url('image')); ?>" method="POST"  class="qwe" name="worksform" id="worksform" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return check();" >
    <?php echo e(csrf_field()); ?>

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
    <label for="avatar">대표이미지</label>
    <input type="file" onchange="checkFile(this);" multiple id="real-input" name="picture" class="image_inputType_file" accept="image*/">
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
                
              </div>
            </div>
        </div>
          
          
        <div class="sub-container">
          <div class="sub-container2">
          <label for="avatar">추가이미지 1</label>
    <input type="file"  multiple id="real-input" name="picture2" class="image_inputType_file" accept="image*/" onchange="change(this);" id="file2" >
    <div class="preview-wrap">
      <div class="preview-left">
        <div class="preview">
          <img src="" onerror="this.src=''" id="image-session2">
          <div class="preview-image2">
            <!-- 이미지 미리보기 -->
          </div>
        </div>
      </div>
      <div class="preview-right">
        <div class="image-upload">
          
        </div>
      </div>
  </div>
</div>

<div class="sub-container2">
  <label for="avatar">추가이미지 2</label>
    <input type="file"  multiple id="real-input" name="picture3" class="image_inputType_file" accept="image*/" onchange="change2(this);">
   
    <div class="preview-wrap">
      <div class="preview-left">
        <div class="preview">
          <img src="" onerror="this.src=''" id="image-session3">
          <div class="preview-image">
            <!-- 이미지 미리보기 -->
          </div>
        </div>
      </div>
      <div class="preview-right">
        <div class="image-upload">
          
        </div>
      </div>
  </div>
</div>

<div class="sub-container2">
  <label for="avatar">추가이미지 3</label>
    <input type="file"  multiple id="real-input" name="picture4" class="image_inputType_file" accept="image*/" onchange="change3(this);">
    <div class="preview-wrap" >
      <div class="preview-left">
        <div class="preview">
          <img src="" onerror="this.src=''" id="image-session4">
          <div class="preview-image">
            <!-- 이미지 미리보기 -->
          </div>
        </div>
      </div>
      <div class="preview-right">
        <div class="image-upload">
          
        </div>
      </div>
  </div>
</div>
        </div>
   <div id="div-preview">
   </div>
    



    <div class="c">
           <input id="year" type="text" name="year" />학년도          
    </div>
    <div class="year_blank" id="year_blank"></div>
    
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
                                var year = $('year');
                                var year_cont = year.val();
                                
                        
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
                            if (year_cont == "") {
                                    $('#year_blank')
                                        .text("년도를 입력해주세요.")
                                        .css('color', 'red');
                                    content_cont.focus();
                                    return false;
                                
                            }
                           

                          }
                          function change(fl) {
                              if (fl.files && fl.files[0]) {
                                var reader = new FileReader();
                                // 이미지 미리보기해주는 jquery
                                reader.onload = function (e) {
                                  $('#image-session2').attr('src', e.target.result);
                                }
                          
                                reader.readAsDataURL(fl.files[0]);
                              }
                            }

                            function change2(al) {
                              if (al.files && al.files[0]) {
                                var reader = new FileReader();
                                // 이미지 미리보기해주는 jquery
                                reader.onload = function (e) {
                                  $('#image-session3').attr('src', e.target.result);
                                }
                          
                                reader.readAsDataURL(al.files[0]);
                              }
                            }

                            function change3(bl) {
                              if (bl.files && bl.files[0]) {
                                var reader = new FileReader();
                                // 이미지 미리보기해주는 jquery
                                reader.onload = function (e) {
                                  $('#image-session4').attr('src', e.target.result);
                                }
                          
                                reader.readAsDataURL(bl.files[0]);
                              }
                            }
                            

/* 첨부파일 추가 */
</script>

<?php /**PATH C:\xampp\htdocs\jolove2\laravel\resources\views/image.blade.php ENDPATH**/ ?>