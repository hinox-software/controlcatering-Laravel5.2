<?php $__env->startSection('htmlheader_title'); ?>
    Tecnicos
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
                        <b>Tecnicos</b> 
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <td> 
                            <?php echo link_to_route('tecnicos.create',$title = 'Nuevo Tecnico',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);; ?>

                        </td>
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>CI</th>
                                <th>Telefono</th>
                                <th>Empresa</th>
                                <th>Estado</th>
                                <th>Comandos</th>
                                
                            </thead>
                            <?php foreach($tec as $p): ?>
                            <tbody>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->codigo); ?></td>
                                <td><?php echo e($p->nombre); ?></td>
                                <td><?php echo e($p->ci); ?></td>
                                <td><?php echo e($p->telefono); ?></td>
                                <td><?php echo e($p->empresa); ?></td>
                                <td></td>
                                <td>
                                    <?php echo link_to_route('tecnicos.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);; ?>

                                </td>
                                
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $tec->render(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>