<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>상세페이지</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="/css/style.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('layouts.navigation')
        <!-- Page Content-->
        <section class="py-5">
        <div class="container px-4 px-lg-5" style="width: 100%; height:100%;">
            <h2 class="title-image" style="margin-top: 1rem;">대표이미지</h2>
            <div class="row gx-4 gx-lg-5 align-items-center my-5" style="width: 100%">
                @if(isset($product))
            @foreach($product as $products)
                
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="\storage\app\public\{{$products['filename']}}" width="200" height="200" style="border-style: solid" onerror="this.style.display='none'" /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light"></h1>
                    <p>{{$products['title']}}</p>
                    <a class="btn btn-primary" href="#!">소스코드 보기</a>
                </div>
            </div>
            @endforeach
            @auth
            <th>좋아요</th>
<td> <input id="likebtn" type="button" value="♥" /></td>
            @else
            <th>좋아요</th>
            <td> <input type="button" value="♥" style="pointer-events: none"/> </td> 
            @endif 
            @endif
            

    
               <div class="view isk">
                    <img src="/img/eye.png" width="16" height="16" alt="조회수">
                    <div class="see_num intf" name="">
                     @if ($products['visit_count'] !=0)
                        <span>{{$products['visit_count']}}</span>
                      @else
                        <span>0</span>
                      @endif 
            </div>
        
            {{-- <!-- @endforeach --> --}}
            <!-- Call to Action-->
            {{-- <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0"></p></div>
            </div> --}}
   
            <!-- Content Row-->
           
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 2</h2>
                            @foreach($product as $products)
                           <img class="img-fluid rounded mb-4 mb-lg-0" src= "\storage\app\public\{{$products['subimage_1']}}" width="200" height="200" onerror="this.style.display='none'" />
                        @endforeach
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 3</h2>
                            @foreach($product as $products)
                            <img class="img-fluid rounded mb-4 mb-lg-0" src= "\storage\app\public\{{$products['subimage_2']}}" width="200" height="200"onerror="this.style.display='none'"/>
                            @endforeach
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">이미지 4</h2>
                            @foreach($product as $products)
                            <img class="img-fluid rounded mb-4 mb-lg-0"src= "\storage\app\public\{{$products['subimage_3']}}" width="200" height="200" onerror="this.style.display='none'"/>
                            @endforeach
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
            </div>
            


            <div class="people_comment">
            <div class="dat_lab">
              <h2>댓글</h2>
            </div>

            <form class="form-horizontal" method="POST"  role="form" name="frm_custom" id="frm_custom"  enctype="multipart/form-data">
                {{csrf_field()}}
                @foreach($comment as $comments)
              <input type="hidden" name="no" id="no" value="{{ $comments['w_no'] }}"> 
                 @endforeach
              <div class="combox">
                <div class="comcontent">
                  <div class="comment_munie">
                    <textarea class="comment_text" name="c_comments" id="c_comments" rows="8" cols="80" placeholder="댓글 내용 입력" required></textarea>
                  </div>
                    <div class="col-xs-12 mt-3 text-center">
                        <button type="button" class="btn btn-sm btn-primary" id="btn_custom_update">글작성</button>
                    </div>
                </div>
                </div>
            </form>


              <div class="comment_new">
                <div class="">

                  <h3>전체 댓글</h3>
                </div>
                @foreach ($comment as $key => $comments)
                  <div class="create_comment">
                    <div class="neadcomt">
                      <div class="comment_naeyoung">
                        <div class="comment_people">

                          {{$comments['u_no']}}
                        </div>
                        <div class="value_comment">
                          <p> {{$comments['c_comments']}}</p>
                        </div>
                    </div>
                  </div>
                @endforeach
              </div>
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
        


        <script type="text/javascript">
            
       
        $(document).on("click", "#btn_custom_update", function () {
                custom_update();
            });

        $(document).ready(function(){
            $("#likebtn").click(likedata);
        });

        var w_no = {{$products->no}};
        var c_comments = $("#c_comments").serialize();
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
                        if(data=="1"){
                            $("#likebtn").attr("value","♥");
                        }
                        else{
                            $("#likebtn").attr("value","♡");
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
   data: {'c_comments' : c_comments,
            'w_no' : w_no},
         dataType : 'json',
         success: function(data, statusText, jqXHR){
                    console.log("성공")
                    console.log(data); //응답 body부 데이터
                       console.log(statusText); //"succes"로 고정인듯함
                       console.log(jqXHR);
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

</html>
