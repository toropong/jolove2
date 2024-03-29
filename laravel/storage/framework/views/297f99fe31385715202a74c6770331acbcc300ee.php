<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <title>검색결과</title>
    <style>html, body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
      }</style>
</head>
<body>
  <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section class="py-5" style="100%">
    <div class="hr-sect">
      검색 결과
    </div>
    <form action="<?php echo e(url('search')); ?>" method="post" style="text-align: center" >
        <?php echo e(csrf_field()); ?>

    <input type="text" name="query" maxlength="255"
    autocomplete="off" >
    <input type="submit" value="검색">
    </form>
    <div class="container px-4 px-lg-5 mt-5" id= first-display>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php if($result_cnt<1): ?>
        <div style="height: 100%">'<?php echo e($search_query); ?>'에 대한 검색결과가 없습니다.</div>
        <?php elseif($search_query == false): ?>
        <div>''에 대한 검색결과가 없습니다.</div>
        <?php else: ?>
            <?php $__currentLoopData = $result_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="big-container" style="width: 20%; height: 250px; border:1px solid;  margin:2%; border-radius:3px; display:inline-block ">
                  <div class="image-container" style="width: 100%; height:70%; display: inline-block  ">
                      <div class="image-small" style="width: 100%; height:100%; display:inline-block; position:relative">
                  <img src="/imglib/<?php echo e($searchlist->filename); ?>" style="width:100%; height:100%; object-fit: cover;" >
                  </div>    
                  </div>
                  <div class="medium-container">
                          <div class="text-center">
                              <h5 class="fw-bolder"><?php echo e($searchlist->title); ?></h5>
                          </div>
                      </div>
                      <div class="small-container">
                          <div class="text-center">
                          <a class="btn btn-outline-dark mt-auto" href="/product/<?php echo e($searchlist->no); ?>" >
                                  작품 보기
                              </a>
                          </div>
                      </div>
                  </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
    </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
  <script type="text/javascript">
  $("div.image-in").click(
    function()
    {
      window.location = $(this).attr("url");
      return false;
    });
  </script>
 </body>
 </html><?php /**PATH C:\xampp\htdocs\jolove2\laravel\resources\views/search_result.blade.php ENDPATH**/ ?>