<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>상세페이지</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Page Content-->
        <section class="py-5">
        <div class="container px-4 px-lg-5" style="width: 100%; height:100%; margin:0;">
            <?php if(isset($product)): ?>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="title-image" style="margin-top: 1rem;">작품명 : <?php echo e($products['title']); ?></h2>
           
            <p>대표이미지</p>
            <div class="row gx-4 gx-lg-5 align-items-center " style="width: 100%">
           
                
                <div class="col-lg-7" style="width: 30%;"><img class="img-fluid rounded mb-4 mb-lg-0" src="/imglib/<?php echo e($products['filename']); ?>" width="200" height="200" style="border-style: solid" onerror="this.style.display='none'" /></div>
                <div class="col-lg-5" style="width: 200px; height:200px; border:1px solid;">
                    <p><?php echo e($products['cont']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if( isset ( Auth::user()->id) ): ?> 
            
            <th>좋아요</th>
            <?php if($likes2==1): ?>
<td> <input id="likebtn" type="button" value="♥" /><input id = "count"  style="pointer-events: none" value="<?php echo e($likes); ?>"></td>
            <?php else: ?>
                <td> <input id="likebtn" type="button" value="♡" /><input id = "count"  style="pointer-events: none" value="<?php echo e($likes); ?>"></td>
            <?php endif; ?>
            <?php else: ?>
            <th>좋아요</th>
            <td> <input type="button" value="♥" style="pointer-events: none"/><input id = "count" value="<?php echo e($likes); ?>"></td> 
            <?php endif; ?>
            <?php endif; ?> 
           
            

    
               <div class="view isk">
                <ion-icon name="eye-outline" size="medium"></ion-icon>조회수
                    <div class="see_num intf" name="">
                     <?php if($products['visit_count'] !=0): ?>
                        <span><?php echo e($products['visit_count']); ?></span>
                      <?php else: ?>
                        <span>0</span>
                      <?php endif; ?> 
            </div>
        
            
            <!-- Call to Action-->
            
   
            <!-- Content Row-->
           
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 2</h2>
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <img class="img-fluid rounded mb-4 mb-lg-0" src= "/imglib/<?php echo e($products['subimage_1']); ?>" width="200" height="200" onerror="this.style.display='none'" />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 3</h2>
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src= "/imglib/<?php echo e($products['subimage_2']); ?>" width="200" height="200"onerror="this.style.display='none'"/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 4</h2>
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="img-fluid rounded mb-4 mb-lg-0"src= "/imglib/<?php echo e($products['subimage_3']); ?>" width="200" height="200" onerror="this.style.display='none'"/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            


            <div class="people_comment">
            <div class="dat_lab">
              <h2>댓글</h2>
            </div>

            <!-- <form class="form-horizontal" action="/product/update" method="POST"  role="form" name="frm_custom" id="frm_custom"  enctype="multipart/form-data"> -->
                <!-- <?php echo e(csrf_field()); ?> -->
              <div class="combox">
                <div class="comcontent">
                  <div class="comment_munie">
                  <?php if(Auth::user()): ?>
                    <textarea  name="c_comments" id="c_comments" value="" rows="8" cols="80" placeholder="댓글 내용 입력" required> </textarea>
                    <?php else: ?>
                    <textarea  name="c_comments" id="c_comments" value="" rows="8" cols="80" placeholder="댓글 내용 입력" readonly> </textarea>
                    <?php endif; ?>
                  </div>
                    <div class="col-xs-12 mt-3 text-center">
                        <button type="button" class="btn btn-sm btn-primary" id="btn_custom_update">글작성</button>
                    </div>
                </div>
                </div>
            <!-- </form> -->
              <div class="comment_new">
                <div class="">

                <h3>전체 댓글</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>작성자아이디</th>
                            <th>댓글내용</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                     <tr>
                        <td><?php echo e($comments['userid']); ?></td>
                        <td><?php echo e($comments['c_comments']); ?></td>
                      <?php if(!Auth::user()): ?>
                        <td></td>
                        <?php elseif($comments->u_no==Auth::user()->id): ?>
                            <td>
                            <form action="delete/<?php echo e($comments->c_no); ?>"  method="POST">
                            <?php echo csrf_field(); ?>
                                <button type="submit"  class="btn btn-sm btn-primary" id="btn_comment_delete" name="remove" id="removes" value="삭제">삭제</button>
                              </form>  
                            </td>
                     <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
            </tbody>
        </table>
            </div>
          </div>

    </section>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
                    </div>
                    <div class="col-auto">
                        <a class="link-light small" href="/manage/register">등록하기</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script type="text/javascript">

       
        $(document).on("click", "#btn_custom_update", function () {
                custom_update();
            });

        // $(document).on("click", "#btn_comment_delete", function () {
        //     comment_delete();
        // });

        $(document).ready(function(){
            $("#likebtn").click(likedata);
        });

        

        var w_no = <?php echo e($products->no); ?>;
        var c_comments = $("#c_comments").val();


    function likedata(){
    $.ajax({
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url : 'test',
        async : true,
    
            dataType : 'json',
            data : {"likevalue" : $("#likebtn").val(), 
            "w_no" : w_no},
            success: function(data, statusText, jqXHR){
                        console.log("성공")
                        console.log(data); //응답 body부 데이터
                        console.log(statusText); //"succes"로 고정인듯함
                        console.log(jqXHR);
                            if(data['a']=="1"){
                                $("#likebtn").attr("value","♥");
                                $("#count").attr("value",data['b']);
                            }
                            else{
                                $("#likebtn").attr("value","♡");
                                $("#count").attr("value",data['b']);
                            }
                           
                            
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(jqXHR);  //응답 메시지
                        console.log(textStatus); //"error"로 고정인듯함
                        console.log(errorThrown);
                        console.log("실패");
                    }
                })
}

    function custom_update() {

    $.ajax({
    type : 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url : 'update', 
    async : true,
    data: {
        'c_comments': $("#c_comments").val(),
        'w_no' : w_no},
         dataType : 'json',
         success: function(data, statusText, jqXHR){
                    console.log("성공")
                    console.log(data); //응답 body부 데이터
                       console.log(statusText); //"succes"로 고정인듯함
                       console.log(jqXHR);
                       location.reload();
                },
                
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);  //응답 메시지
                       console.log(textStatus); //"error"로 고정인듯함
                       console.log(errorThrown);
                    console.log("실패"); //변경사항
                    location.reload();
                 }
            })
             
    }


    function comment_delete() {
    $.ajax({
    type : 'POST',
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    url : 'delete', 
    async : true,
    data: {
        'c_no': $('#c_no').val(),
        'w_no' : w_no},
    dataType : 'json',
    success: function(data, statusText, jqXHR){
                console.log("성공")
                console.log(data); //응답 body부 데이터
                console.log(statusText); //"succes"로 고정인듯함
                console.log(jqXHR);
            
                 if(data==1){
                    alert('삭제되었습니다.'); location.reload();
                }
            },
            
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR);  //응답 메시지
                console.log(textStatus); //"error"로 고정인듯함
                console.log(errorThrown);
                console.log("실패");
            }
        })
    }

</script>

</html><?php /**PATH C:\xampp\htdocs\jolove2\laravel\resources\views/product.blade.php ENDPATH**/ ?>