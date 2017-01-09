<?php $__env->startSection('htmlheader_title'); ?>
    Usuarios
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
               
                
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-download"></i> Importar OT de TIGO - INSTALACIONES
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <?php echo Form::open(['route'=>'importar.store','method'=>'POST', 'files'=>true]); ?>

                             <div class="col-lg-3 col-md-3">
                                <dl >
                                    <dt>Fecha de Asignacion OTs</dt>
                                    <dd>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php echo Form::text('fechaimportado',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fechaimportado']); ?>

                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Tipo Trabajos</dt>
                                    <dd>
                                      <div class="form-group">
                                      <?php echo Form::select('tipotrabajos', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright']); ?>

                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>DPTO</dt>
                                    <dd>
                                      <div class="form-group">
                                      <?php echo Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']); ?>

                                    </div>
                                    </dd>                                        
                                </dl>
                             </div>
                             <div class="col-lg-4 col-md-4">
                                <dl >
                                    <dt>Cargar Archivo OTs (Excel)</dt>
                                    <dd><?php echo Form::file('archivo'); ?></dd>                                        
                                </dl>
                             </div>
                             <?php echo Form::submit('Subir Archivo', ['class'=>'btn btn-primary']); ?>

                                  <?php echo Form::close(); ?>

                            
                        </div>

                      <?php if(Session::has('message')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo e(Session::get('message')); ?>

                        </div>
                      <?php endif; ?>
                          
                 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>