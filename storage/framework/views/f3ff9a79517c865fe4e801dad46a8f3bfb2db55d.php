<?php $__env->startSection('htmlheader_title'); ?>
    Editar Tecnico
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Editar Tecnicos
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                     <div class="panel-body">
                        <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::model($tec,['route'=>['tecnicos.update',$tec->id],'method'=>'PUT']); ?>

                        <div class="row">

                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo</dt>
                                    <dd><?php echo Form::text('codigo',null, ['id'=> 'codigo','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd><?php echo Form::text('nombre',null, ['id'=> 'nombre','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>CI</dt>
                                    <dd><?php echo Form::text('ci',null, ['id'=> 'ci','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono</dt>
                                    <dd><?php echo Form::text('telefono',null, ['id'=> 'telefono','class'=>'form-control pullright']); ?></dd>                                        
                                    
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Empresa</dt>
                                    <dd><?php echo Form::text('empresa',null, ['id'=> 'empresa','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>Estado</dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <?php echo Form::submit('Registrar ', ['class'=>'btn btn-primary']); ?>

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