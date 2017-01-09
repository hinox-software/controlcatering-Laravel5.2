<?php $__env->startSection('htmlheader_title'); ?>
    Reportes OT Estados
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading"> <i class="fa fa-file-text-o"></i> Reportes de OT Realizados.
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                       <div class="row">

                        <div >
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>F-Asignado</th>
                                <th>ID</th>
                                <th>Tipo Planilla</th>
                                <th>Codigo</th>
                                <th>Nombre Cliente</th>
                                <th>OT</th>
                                <th>Tipo</th>
                                <th>Serv</th>
                                <th>Poblacion</th>
                                <th>Ultima Act</th>
                                <th>Estado</th>
                                <th>Motivo</th>
                                <th>Descripcion</th>
                                <th></th>
                                
                                
                                
                            </thead>
                            <?php foreach($tra as $p): ?>
                            <tbody>
                                <td><?php echo e($p->fechaimportadoasignado); ?></td>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->tipoplanilla); ?></td>
                                <td><?php echo e($p->codigocliente); ?></td>
                                <td><?php echo e($p->nombrecliente); ?></td>
                                <td><?php echo e($p->ot); ?></td>
                                <td><?php echo e($p->tipoconfig); ?></td>
                                <td><?php echo e($p->tiposervicio); ?></td>
                                <td><?php echo e($p->poblacion); ?></td>
                                <td><?php echo e($p->fechaactualizado); ?></td>
                                <td>
                                    <?php if($p->estado=="REGISTRADO" ): ?>
                                        <span class="label label-danger"><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="ATENDIDO" or $p->estado=="CONFIRMADO" or $p->estado=="ASIGNADO"): ?>
                                        <span class="label label-warning"><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="EJECUTADO" or $p->estado=="PENDIENTE" or $p->estado=="TERMINADO"): ?>
                                        <span class="label label-success"><?php echo e($p->estado); ?></span>
                                    <?php elseif($p->estado=="CERRADO"): ?>
                                        <span class="label label-info"><?php echo e($p->estado); ?></span>
                                    <?php endif; ?>

                                </td>
                                <td><?php echo e($p->motivo); ?></td>
                                <td><?php echo e($p->descripcion); ?></td>
                               
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appsinmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>