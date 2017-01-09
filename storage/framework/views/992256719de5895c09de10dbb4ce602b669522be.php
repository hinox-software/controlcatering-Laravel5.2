<?php $__env->startSection('htmlheader_title'); ?>
	Home
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa  fa-shopping-cart"></i> Compras
                <div class="pull-right info">
                    <i class="fa fa-user"></i>
                </div>
            </div>

        <!-- INICIO BODY-->
        <div class="panel-body">
         <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <form action="<?php echo e(url('/register')); ?>" method="post">
            <div class="row">
            <div class="col-lg-6 col-md-6">  
                <div class="form-group">
                    <?php echo Form::label('Nombre'); ?>

                    <?php echo Form::text('name', null , ['class'=>'form-control pullright','placeholder'=>'Nombre']); ?>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Correo'); ?>

                    <?php echo Form::text('email', null, ['class'=>'form-control pullright','placeholder'=>'Correo']); ?>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Correo'); ?>

                    <?php echo Form::password('Contraseña', null, ['class'=>'form-control pullright']); ?>

                </div>
            </div>
            
             <?php echo Form::label('Fecha Entrega'); ?>

         <?php echo Form::submit('Registrar', ['class'=>'btn btn-primary']); ?>

         <?php echo Form::close(); ?>

        </div>
         <div class="row">
        <div class="col-lg-3 col-md-3 ">  
                <div class="form-group">
                    <?php echo Form::label('Fecha Registro'); ?>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                            <?php echo Form::text('fecha_registro',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fecha_registro']); ?>

                    </div>
                </div> 
            </div>
        </div>

        
        </div>               
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>