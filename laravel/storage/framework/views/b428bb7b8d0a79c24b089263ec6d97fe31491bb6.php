<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>

    <link href="css/login.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="login-box">
                    <form method="POST" class="login-form" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                            <h1 class="logo">LogIn</h1>
                            <div class="textForm">
                                <input id="userid" type="text" class="form-control <?php $__errorArgs = ['userid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="userid" value="<?php echo e(old('userid')); ?>" required autocomplete="userid" autofocus placeholder="아이디">
                            </div>
                    
                            <div class="textForm">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="비밀번호">
                            </div>
                        
                                <button type="submit" class="login_bt" value="로그인">
                                    <?php echo e(__('Login')); ?>

                                </button>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="findid">
                                        아이디 /
                                    </a>
                                    <a class="btn btn-link" href=findpw>
                                        비밀번호 찾기 /
                                    </a>
                                    <a class="btn btn-link" href=register>
                                         회원가입
                                    </a>
                                <?php endif; ?>
                    </form>
                </div>

</body>
</html>
            

<?php /**PATH C:\xampp\htdocs\jolove2\laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>