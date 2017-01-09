<?php $__env->startSection('htmlheader_title'); ?>
    Cierre de Jornada/Planilla
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
                <?php if(Session::has('message1')): ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('message1')); ?>

                </div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-users"></i> Cierre de Jornada/Planilla
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                       <div class="row">
                            <?php echo Form::open(['route'=>'trabajos.ejecutacerrarjornada','method'=>'POST']); ?>

                            <div class="col-lg-3 col-md-3">
                                <dl >
                                    <dt>Fecha a Cerrar</dt>
                                    <dd>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php echo Form::text('fechacerrarjornada',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha','id'=>'fechacerrarjornada']); ?>

                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Tipo Trabajos</dt>
                                    <dd>
                                        <?php echo Form::select('tipotrabajo', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright', 'id'=>'tipotrabajo']); ?>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <dl >
                                    <dt>Dpto</dt>
                                    <dd><?php echo Form::select('dpto', Config::get('constants.dpto'),Session::get('dptoseleccionado'), ['class' => 'form-control pullright', 'id'=>'dpto']); ?>

                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <dl >
                                    <dt></dt>
                                    <dd><?php echo Form::submit('Cerrar Jornada/Planilla', ['class'=>'btn btn-primary']); ?>

                                  
                                </dl>
                            </div>
                        </div>
                        
                        <?php echo Form::close(); ?></dd>                                        

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>