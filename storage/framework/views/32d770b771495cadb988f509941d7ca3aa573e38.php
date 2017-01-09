<?php $__env->startSection('htmlheader_title'); ?>
    Usuarios
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
                    <div class="panel-heading"> <i class="fa fa-users"></i> Usuarios
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <table class="table">
                                <td> 
                                <?php echo link_to_route('user.create',$title = 'Nuevo Usuario',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);; ?>

                            </td>
                            </table>    
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Tipo</th>
                                <th>Dpto</th>
                                <th>Estado</th>
                                <th>INST</th>
                                <th>RETI</th>
                                <th>ASIS</th>
                                <th>COORD</th>
                                <th>CENTR</th>
                                <th>DIGIT</th>
                                
                            </thead>
                            <?php foreach($usu as $p): ?>
                            <tbody>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->name); ?></td>
                                <td><?php echo e($p->email); ?></td>
                                <td><?php echo e($p->tipo); ?></td>
                                <td><?php echo e($p->dpto); ?></td>
                                <td><?php echo e($p->estado); ?></td>
                                <td><?php echo e($p->activaInstalacion); ?></td>
                                <td><?php echo e($p->activaRetiro); ?></td>
                                <td><?php echo e($p->activaAsitencia); ?></td>
                                <td><?php echo e($p->activaCoordinacion); ?></td>
                                <td><?php echo e($p->activaCentralizacion); ?></td>
                                <td><?php echo e($p->activaDigitacion); ?></td>
                                <td>
                                    <?php echo link_to_route('user.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);; ?>

                                </td>
                                <td>
                                    
                                </td>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $usu->render(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>