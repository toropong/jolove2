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
        {{-- <link href="/css/style.css" rel="stylesheet" /> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('layouts.navigation')
        <!-- Page Content-->
       
        <div class="container px-4 px-lg-5" style="width: 100%; height:100%;">
            <h2 class="title-image" style="margin-top: 1rem;">대표이미지</h2>
            <div class="row gx-4 gx-lg-5 align-items-center my-5" style="width: 100%">
                @foreach($product as $products)
                
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="\storage\app\public\{{$products->filename}}" width="200" height="200" style="border-style: solid" onerror="this.style.display='none'" /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light"></h1>
                    <p>{{$products->title}}</p>
                    @endforeach
                    <a class="btn btn-primary" href="#!">소스코드 보기</a>
                </div>
            </div>
            
               <div class="view isk">
                    <img src="/img/eye.png" width="16" height="16" alt="조회수">
                    <div class="see_num intf" name="">
                      {{-- @if ($product['visit_count'] !=0)
                        <span>{{$product['visit_count']}}</span>
                      @else
                        <span>0</span>
                      @endif --}}
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
                           <img class="img-fluid rounded mb-4 mb-lg-0" src= "\storage\app\public\{{$products->subimage_1}}" width="200" height="200" onerror="this.style.display='none'" />
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
                            <img class="img-fluid rounded mb-4 mb-lg-0" src= "\storage\app\public\{{$products->subimage_2}}" width="200" height="200"onerror="this.style.display='none'"/>
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
                            <img class="img-fluid rounded mb-4 mb-lg-0"src= "\storage\app\public\{{$products->subimage_3}}" width="200" height="200" onerror="this.style.display='none'"/>
                            @endforeach
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
