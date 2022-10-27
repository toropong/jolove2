<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        {{-- <link href="/css/styles.css" rel="stylesheet" /> --}}
    </head>
    <body>
        <!-- Navigation-->
@include('layouts.navigation')
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">졸업 작품</h1>
                    <!-- <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> -->
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5" id= first-display>
                <button onclick="showdisplay()">리스트변경</button>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if(isset($lists))
                @foreach($lists as $list)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="\storage\app\public\{{$list['filename']}}" width="200" height="200" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$list['title']}}</h5>
                                    {{-- Team Name --}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="/public/product/{{$list['no']}}">
                                        작품 보기
                                    </a>
                                    @auth
                                    <a class="btn btn-outline-dark mt-auto" href="">작품 삭제</a>
                                    @endauth
                                </div>
                                
                            </div>
                            

                        </div>
                    </div>
@endforeach
@endif
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
                </div>
            </div>
        </section>
        <div class="container px-4 px-lg-5 mt-5" >
            <button onclick="showdisplay2()">리스트변경</button>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

<div class="container_2" style="width: 80%; display:none;" id="second-display" >
    {{-- <h2>졸업작품</h2> --}}
    <h3><code>.졸업작품</code></h3> 
    @if(isset($lists))
    @foreach($lists as $list)           
    <table class="table">
      <thead>
        <tr>
          <th>번호</th>
          <th>작품이름</th>
          <th>작품설명</th>
        </tr>
      </thead>
     
      <tbody>
        <tr>
          <td>{{$list['no']}}</td>
          <td><a href="product/{{$list['no']}}">{{$list['title']}}</a></td>
          <td><a href="product/{{$list['no']}}">{{$list['cont']}}</a></td>
        </tr>
      </tbody>
    </table>
    @endforeach
    @endif
  </div>       
    </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        
        <script>
            function showdisplay(){
                $('#first-display').hide();
                $('#second-display').show();
            }
            function showdisplay2(){
                $('#second-display').hide();
                $('#first-display').show();
            }
        </script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src="js/scripts.js"></script> --}}
    </body>
</html>