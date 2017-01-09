<?php if($model->responsive): ?>
    height: "100%",
    width: "100%",
<?php else: ?>
    <?php if($model->height): ?>
        height: <?php echo e($model->height); ?>,
    <?php else: ?>
        height: "100%",
    <?php endif; ?>

    <?php if($model->width): ?>
        width: <?php echo e($model->width); ?>,
    <?php else: ?>
        width: "100%",
    <?php endif; ?>
<?php endif; ?>
