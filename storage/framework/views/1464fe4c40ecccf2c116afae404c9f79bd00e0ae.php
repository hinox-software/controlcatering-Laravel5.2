<?php $__env->startSection('htmlheader_title'); ?>
    HISTORIAL
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                
                <div class="panel panel-default">
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Trabajos:</b> <?php echo e(Config::get('constants.tipotrabajo.'.$tipotrabajo)); ?> - <b>Area:</b> <?php echo e(Config::get('constants.areas.'.$area)); ?> - <b>Historial</b>
                        <?php echo e(Form::hidden('area_id', $area,array('id' => 'area_id'))); ?>

                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2 col-lg-2 col-md-2">
                                <dl >
                                    <dt>Codigo Cliente</dt>
                                    <dd><?php echo e($tra->codigocliente); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-5 col-lg-5 col-md-5">
                                <dl >
                                    <dt>Nombre</dt>
                                    <dd><?php echo e($tra->nombrecliente); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-5 col-lg-5 col-md-5">
                                <dl >
                                    <dt>Direccion</dt>
                                    <dd><?php echo e($tra->direccion); ?></dd>                                        
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Telefono 1</dt>
                                    <dd><?php echo e($tra->telefono1); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Poblacion</dt>
                                    <dd><?php echo e($tra->poblacion); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>P-GEO</dt>
                                    <dd><?php echo e($tra->posgeo); ?></dd>
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt></dt>
                                    <dd></dd>
                                </dl>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3">  
                                <dl >
                                    <dt>F-Generacion</dt>
                                    <dd><?php echo e($tra->fechageneracion); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>OT</dt>
                                    <dd><?php echo e($tra->ot); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Tipo</dt>
                                    <dd><?php echo e($tra->tipoconfig); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Servicio</dt>
                                    <dd><?php echo e($tra->tiposervicio); ?></dd>                                        
                                </dl>
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2">  
                                <dl >
                                    <dt>Altura</dt>
                                    <dd><?php echo e($tra->altura); ?></dd>                                        
                                </dl>
                            </div>
                        </div>                     
                        
                                  

                    </div>
                </div>
            </div>
        </div>
    </div>
      

    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        HISTORIAL DE TRABAJOS DEL CLIENTE
                    </div>    
                    <div class="panel-body">
                        <?php echo $__env->make('trabajos.formhistorialexpandido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>    
                </div>    
            </div>    
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appsinmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>