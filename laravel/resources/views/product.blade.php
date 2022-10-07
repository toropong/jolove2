<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>상세페이지</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('layouts.navigation')
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            {{-- <!-- @foreach( $product as $aa) --> --}}
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light"></h1>
                    <p>팀원, 팀명</p>
                    <a class="btn btn-primary" href="#!">소스코드 보기</a>
                </div>
            </div>
               <div class="view isk">
                    <img src="/img/eye.png" width="16" height="16" alt="조회수">
                    <div class="see_num intf" name="">
                      @if ($product['visit_count'] !=0)
                        <span>{{$product['visit_count']}}</span>
                      @else
                        <span>0</span>
                      @endif
            </div>
        
            {{-- <!-- @endforeach --> --}}
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0"></p></div>
            </div>
            <div class="container">
                <div class="form-group">
                    <form method="post" encType = "multipart/form-data" action="commentAction.jsp?bbsID=<%= bbsID %>&boardID=<%=boardID%>">
                        <table class="table table-striped" style="text-align: center; border: 1px solid #dddddd">
                            <tr>
                                <td style="border-bottom:none;" valign="middle"><br><br><%= userID %></td>
                                <td><input type="text" style="height:100px;" class="form-control" placeholder="상대방을 존중하는 댓글을 남깁시다." name = "commentText"></td>
                                <td><br><br><input type="submit" class="btn-primary pull" value="댓글 작성"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품1</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://cdn.gametoc.co.kr/news/photo/202110/62970_203440_5824.png" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품2</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="http://media1.or.kr/wp-content/uploads/2019/08/url-696x444.jpg" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">다른작품3</h2>
                            <img class="img-fluid rounded mb-4 mb-lg-0" src="https://www.joongbu.ac.kr/upload/editor/images/000107/20220221110438606_HB1KJ2XH.jpg" alt="..." />
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">보러가기</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src="/js/scripts.js"></script> --}}
    </body>
</html>
