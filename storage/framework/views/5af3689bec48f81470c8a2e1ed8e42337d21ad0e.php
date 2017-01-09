<?php $__env->startSection('htmlheader_title'); ?>
    Historial de Archivos Importados
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
                    <div class="panel-heading"> 

                        <i class="fa fa-user-plus"></i> 
                        <b>Historial de Archivos Importados:</b> 
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
                                <th>ID</th>
                                <th>Fecha Importado</th>
                                <th>Nombre Archivo</th>
                                <th>Fecha Asignado</th>
                                <th>Tipo de Trabajo</th>
                                <th>Dpto</th>
                                <th>Usuario</th>
                                <th>Comandos</th>
                                
                                
                                
                            </thead>
                            <?php foreach($imp as $p): ?>
                            <tbody>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->fechaimportado); ?></td>
                                <td><?php echo e($p->nombrearchivo); ?></td>
                                <td><?php echo e($p->fechaasignado); ?></td>
                                <td><?php echo e($p->tipotrabajos); ?></td>
                                <td><?php echo e($p->dpto); ?></td>
                                <td><?php echo e($p->FK_usuario_id); ?></td>
                                
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $imp->render(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>