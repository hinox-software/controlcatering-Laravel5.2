<?php if(!$model->container): ?>
	<div>
		<canvas id="<?php echo e($model->id); ?>" <?php echo $__env->make('charts::_partials.dimension.html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>></canvas>
	</div>
<?php endif; ?>