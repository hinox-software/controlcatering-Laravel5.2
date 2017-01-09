<?php $__env->startSection('htmlheader_title'); ?>
    Registro Manual OTs
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Registro Manual de OTs
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                     <div class="panel-body">
                        <?php echo $__env->make('alertas/requerido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::open(['route'=>'trabajos.store','method'=>'POST']); ?>

                        <div class="row">

                            <div class="col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo Cliente</dt>
                                    <dd><?php echo Form::text('codigocliente',null, ['id'=> 'codigocliente','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd><?php echo Form::text('nombre',null, ['id'=> 'nombre','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <dl >
                                    <dt>Direccion</dt>
                                    <dd><?php echo Form::text('direccion',null, ['id'=> 'direccion','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono 1</dt>
                                    <dd><?php echo Form::text('telefono1',null, ['id'=> 'telefono1','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Poblacion</dt>
                                    <dd><?php echo Form::text('poblacion',null, ['id'=> 'poblacion','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-GEO</dt>
                                    <dd><?php echo Form::text('posgeo',null, ['id'=> 'posgeo','class'=>'form-control pullright']); ?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipos de Trabajos</dt>
                                    <dd> <?php echo Form::select('tipotrabajos', Config::get('constants.tipotrabajo'),null, ['class' => 'form-control pullright']); ?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Dpto</dt>
                                    <dd><?php echo Form::select('dpto', Config::get('constants.dpto'),null, ['class' => 'form-control pullright']); ?></dd>
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3">  
                                <dl >
                                    <dt>F-Generacion</dt>
                                    <dd>
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <?php echo Form::text('fechageneracion',date('d/m/Y'), ['class'=>'form-control', 'placeholder'=>'Fecha Registro','id'=>'fechageneracion']); ?>

                                    </div>

                                    </dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>OT</dt>
                                    <dd><?php echo Form::text('ot',null, ['id'=> 'ot','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipo </dt>
                                    <dd><?php echo Form::text('tipo',null, ['id'=> 'tipo','class'=>'form-control pullright','placeholder'=>'D04, IP0, IP1']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Servicio</dt>
                                    <dd><?php echo Form::text('servicio',null, ['id'=> 'servicio','class'=>'form-control pullright','placeholder'=>'AV, AE, ...']); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Altura</dt>
                                    <dd><?php echo Form::text('altura',null, ['id'=> 'altura','class'=>'form-control pullright']); ?></dd>                                        
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-lg-10 col-md-10">
                                <?php echo Form::submit('Registrar OT', ['class'=>'btn btn-primary']); ?>

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