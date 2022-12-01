<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        
    </head>
    <body>
        <!-- Navigation-->
<?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            <form action="<?php echo e(url('search')); ?>" method="post" style="text-align: center" >
                           <?php echo e(csrf_field()); ?>

                <input type="text" name="query" maxlength="255"
                autocomplete="off" >
                <input type="submit" value="검색">
            </form>
            <div class="container px-4 px-lg-5 mt-5" id= first-display>
                <button onclick="showdisplay()" style="margin-bottom: 10px">리스트변경</button>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php if(isset($lists)): ?>
                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <div class="big-container" style="width: 20%; height: 20%; border:1px solid; margin:2%; border-radius:3px; display:inline-block ">
                        <!-- Product image-->
                        <div class="image-container" style="width: 100%; height:100%; display: inline-block  ">
                            <div class="image-small" style="width: 100%; height:100%; display:inline-block; position:relative">
                        <img src="/imglib/<?php echo e($list['filename']); ?>" style="width:100%; height:100%; object-fit: cover;" >
                        </div>    
                        </div>
                        <div class="medium-container">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo e($list['title']); ?></h5>
                                </div>
                            </div>
                            <div class="small-container">
                                <div class="text-center" style="padding: 10px;">
                                    <a class="btn btn-outline-dark mt-auto" href="/product/<?php echo e($list['no']); ?>" >
                                        작품 보기
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>      

                </div>
                <div style="text-align: center; margin-top:50px;"> 
                <?php echo e($lists->links()); ?>         
                </div>
            </div>
            
        </section>
        <div class="container px-4 px-lg-5 mt-5" >
            
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                
<div class="container_2" style="width: 80%; display:none; margin-bottom:20px;" id="second-display" >
    <button onclick="showdisplay2()">리스트변경</button>
    <h3><code>.졸업작품</code></h3> 
    <?php if(isset($lists)): ?>
    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
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
          <td><?php echo e($list['no']); ?></td>
          <td><a href="/product/<?php echo e($list['no']); ?>"><?php echo e($list['title']); ?></a></td>
          <td><a href="/product/<?php echo e($list['no']); ?>"><?php echo e($list['cont']); ?></a></td>
        </tr>
      </tbody>
    </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div style="text-align: center; margin-top:50px;"> 
        <?php echo e($lists->links()); ?>         
        </div>
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
        
    </body>
</html><?php /**PATH C:\xampp\htdocs\jolove2\laravel\resources\views/index.blade.php ENDPATH**/ ?>