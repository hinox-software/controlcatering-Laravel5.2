<?php $__env->startSection('htmlheader_title'); ?>
	Mis Estadisticas
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
<?php echo Charts::assets(); ?>


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <i class="fa fa-bar-chart"></i> 
                        -- PRODUCCION DIARIA  por Operador -- <b>De:</b> <?php echo e(Config::get('constants.tipotrabajo.400')); ?> - <b>Area:</b> <?php echo e(Config::get('constants.areas.1')); ?> 

					</div>

					<div class="panel-body">
						 <?php echo $chartdiario->render(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <i class="fa fa-bar-chart"></i> 
                        -- PRODUCCION DIARIA  por Operador -- <b>De:</b> <?php echo e(Config::get('constants.tipotrabajo.400')); ?> - <b>Area:</b> <?php echo e(Config::get('constants.areas.1')); ?> 

					</div>

					<div class="panel-body">
						 <?php echo $chartplanilla->render(); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>