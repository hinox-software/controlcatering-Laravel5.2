<?php $__env->startSection('htmlheader_title'); ?>
    Editar Zona
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('message')); ?>

                </div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-users"></i> Editar Zona
                         <div class="pull-right info">
                            <i class="fa fa-map-marker"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                     <div class="panel-body">
                        <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::model($zona,['route'=>['zonas.update',$zona->id],'method'=>'PUT']); ?>

                        <div class="row">

                            
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Descripcion</dt>
                                    <dd><?php echo Form::text('descripcion',null, ['id'=> 'descripcion','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Dpto</dt>
                                    <?php echo Form::select('dpto', Config::get('constants.dpto'),$zona->dpto, ['class' => 'form-control pullright']); ?>

                                </dl>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <?php echo Form::submit('Actualizar ', ['class'=>'btn btn-primary']); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </div> 
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>