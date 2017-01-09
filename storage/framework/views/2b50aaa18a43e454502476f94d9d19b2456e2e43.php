<?php $__env->startSection('htmlheader_title'); ?>
    Trabajos X Area
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php if(Session::has('message')): ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('message')); ?>

                </div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Trabajos:</b> <?php echo e(Config::get('constants.tipotrabajo.'.$tipotrabajo)); ?> <b>- Area:</b> <?php echo e(Config::get('constants.areas.'.$area)); ?> <b>- Dpto:</b> <?php echo e(Session::get('dptoseleccionado')); ?>

                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th></th>
                                <th>ID</th>
                                <th></th>
                                <th>Codigo</th>
                                <th>Nombre Cliente</th>
                                <th class='text-center'>OT</th>
                                <th>Tipo</th>
                                <th>Poblacion</th>
                                <th>Direccion</th>
                                <th class='text-center'>Serv</th>
                                <?php if(config('constants.areasnumero.COORDINACION')==$area): ?>
                                <th class='text-center'>On-Line</th>
                                <?php endif; ?>
                                <th class='text-center'>Estado</th>
                                <?php if(config('constants.areasnumero.CENTRALIZACION')==$area): ?>
                                <th>Zona</th>
                                <th>Tecnico</th>
                                <th>Hra</th>
                                <?php endif; ?>
                                

                                <th>Comandos</th>
                                
                            </thead>
                            <?php foreach($tra as $p): ?>
                            <tbody>
                                <td>
                                    <?php if(config('constants.tipotrabajonumero.INSTALACION')==$tipotrabajo): ?>
                                        <i class="fa fa-user-plus" title="<?php echo e(config('constants.tipotrabajo.'.$tipotrabajo)); ?>"></i>
                                    <?php endif; ?>
                                    <?php if(config('constants.tipotrabajonumero.RETIROS_SOLICITADOS')==$tipotrabajo): ?>
                                        <i class="fa fa-user-times" title="<?php echo e(config('constants.tipotrabajo.'.$tipotrabajo)); ?>"></i>
                                    <?php endif; ?>
                                    <?php if(config('constants.tipotrabajonumero.RETIROS_GENERADOS')==$tipotrabajo): ?>
                                        <i class="fa fa-user-times text-yellow" title="<?php echo e(config('constants.tipotrabajo.'.$tipotrabajo)); ?>"></i>
                                    <?php endif; ?>
                                    <?php if(config('constants.tipotrabajonumero.ASISTENCIAS')==$tipotrabajo): ?>
                                        <i class="fa fa-ambulance" title="<?php echo e(config('constants.tipotrabajo.'.$tipotrabajo)); ?>"></i>
                                    <?php endif; ?>

                                </td>
                                <td><?php echo e($p->id); ?></td>
                                <td>
                                     <?php if($p->origen=="M"): ?>
                                        <i class="fa fa-newspaper-o text-yellow" title="Registro Manual"></i>
                                     <?php endif; ?> 
                                     <?php if($p->origen=="P"): ?>
                                        <i class="fa fa-download text-yellow" title="Registro Automatico"></i>
                                     <?php endif; ?> 

                                </td>
                                <td><?php echo e($p->codigocliente); ?></td>
                                <td><?php echo e($p->nombrecliente); ?></td>
                                <td><?php echo e($p->ot); ?></td>
                                <td><?php echo e($p->tipoconfig); ?></td>
                                <td><?php echo e($p->poblacion); ?></td>
                                <td><?php echo e($p->direccion); ?></td>
                                <td class='text-center'><?php echo e($p->tiposervicio); ?></td>
                                <?php if(config('constants.areasnumero.COORDINACION')==$area): ?>
                                <td class='text-center'>                                    
                                        <?php if($p->FK_usuarioatiende_id==0): ?>
                                                <i class="fa fa-phone-square text-green" style="font-size: 18px;" title="LIBRE"></i>
                                        <?php else: ?>
                                                <i class="fa fa-phone-square text-red" style="font-size: 18px;" title="<?php echo e($p->usuarioatiende->email); ?>"></i>
                                        <?php endif; ?>                                    
                                    
                                    <?php if($p->estado=="ATENDIDO" ): ?>
                                            <span class="label label-warning" style="vertical-align:super;font-size: 8px;"><?php echo e($p->nroatendido); ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <td>
                                    
                                     <?php if($p->estado=="REGISTRADO" ): ?>
                                        <span class="label label-danger"><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="ATENDIDO" or $p->estado=="CONFIRMADO" or $p->estado=="ASIGNADO" or $p->estado=="PENDIENTE"): ?>
                                        <span class="label label-warning"><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="EJECUTADO" or $p->estado=="TERMINADO" or $p->estado=="NO_CERRADO" ): ?>
                                        <span class="label label-success" ><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="CERRADO" ): ?> 
                                        <span class="label label-info"><?php echo e($p->estado); ?></span>
                                    <?php endif; ?>
 
                                </td>
                                <?php if(config('constants.areasnumero.CENTRALIZACION')==$area): ?>
                                <td class='text-center'><?php echo e($p->zonaasig); ?></td>    
                                <td><?php echo e($p->tecnicoasig); ?></td>
                                <td><?php echo e($p->horario); ?></td>
                                <?php endif; ?>

                                <td>

                                    <?php echo link_to_route('trabajos.adicionartrabajo', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa  fa-cogs', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Atender' ]);; ?>

                                    <?php echo link_to_route('trabajos.historialtrabajo', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa fa-list', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Historial' , 'target'=>'_blank' ]);; ?>

                                    <?php echo link_to_route('reportehistorial', '', $parameters = [$tipotrabajo, $area,$p->id], $attributes = ['class'=>'fa fa-cloud-download', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Generar PDF' , 'target'=>'_blank' ]);; ?>


                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $tra->render(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>