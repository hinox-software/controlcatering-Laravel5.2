<?php $__env->startSection('htmlheader_title'); ?>
    Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo e(url('/home')); ?>"><b>Sistema</b>OT</a>
        </div>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> <?php echo e(trans('adminlte_lang::message.someproblems')); ?><br><br>
                <ul>
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="register-box-body">
            <p class="login-box-msg"><?php echo e(trans('adminlte_lang::message.registermember')); ?></p>
            <form action="<?php echo e(url('/register')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.fullname')); ?>" name="name" value="<?php echo e(old('name')); ?>"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.email')); ?>" name="email" value="<?php echo e(old('email')); ?>"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.password')); ?>" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="<?php echo e(trans('adminlte_lang::message.retrypepassword')); ?>" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <label>
                            <div class="checkbox_register icheck">
                                <label>
                                    <!-- <input type="checkbox" name="terms"> -->
                                </label>
                            </div>
                        </label>
                    </div><!-- /.col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <!--<button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal1"><?php echo e(trans('adminlte_lang::message.terms')); ?></button> -->
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4 col-xs-push-1">
                        <!--<button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('adminlte_lang::message.register')); ?></button> -->
                    </div><!-- /.col -->
                </div>
            </form>

            

            <a href="<?php echo e(url('/login')); ?>" class="text-center"><?php echo e(trans('adminlte_lang::message.membreship')); ?></a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('auth.terms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>