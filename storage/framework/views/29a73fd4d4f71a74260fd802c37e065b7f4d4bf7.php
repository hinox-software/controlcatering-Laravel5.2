<?php $__env->startSection('htmlheader_title'); ?>
    Zonas
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

                        <i class="fa fa-map-marker"></i> 
                        <b>Zonas</b> 
                         <div class="pull-right info">
                            <i class="fa fa-user"></i>  <?php echo e(Auth::user()->name); ?>

                        </div>
                    </div>

                    <div class="panel-body">
                        <td> 
                            <?php echo link_to_route('zonas.create',$title = 'Nueva Zona',null, $attributes = ['class'=>'btn btn-info pull-right -primary' ]);; ?>

                        </td>
                        <div class="row">
                              
                        </div>
                          
                        <div class="table-responsive">
                        <table  class="table table-striped table-hover table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Dpto</th>
                                <th>Comandos</th>
                                
                            </thead>
                            <?php foreach($zona as $p): ?>
                            <tbody>
                                <td><?php echo e($p->id); ?></td>
                                <td><?php echo e($p->descripcion); ?></td>
                                <td><?php echo e($p->dpto); ?></td>
                                <td>
                                    <?php echo link_to_route('zonas.edit', $title = 'Editar', $parameters = $p->id, $attributes = ['class'=>'btn btn-primary']);; ?>

                                </td>
                                
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                        <?php echo $zona->render(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>