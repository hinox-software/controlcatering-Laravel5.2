<?php $__env->startSection('htmlheader_title'); ?>
	Home
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						<?php echo e(trans('adminlte_lang::message.logged')); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>