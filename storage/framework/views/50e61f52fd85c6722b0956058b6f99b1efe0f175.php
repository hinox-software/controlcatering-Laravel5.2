<?php if(!$model->container): ?>
	<svg id="<?php echo e($model->id); ?>" <?php echo $__env->make('charts::_partials.dimension.html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>></svg>
<?php endif; ?>