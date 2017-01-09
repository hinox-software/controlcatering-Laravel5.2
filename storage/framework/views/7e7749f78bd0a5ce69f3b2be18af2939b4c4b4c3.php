<?php for($i = 0; $i < count($model->datasets); $i++): ?>
    var s<?php echo e($i); ?> = [
        <?php for($k = 0; $k < count($model->datasets[$i]['values']); $k++): ?>
            {
                x: "<?php echo e($model->labels[$k]); ?>",
                y: <?php echo e($model->datasets[$i]['values'][$k]); ?>

            },
        <?php endfor; ?>
    ];
<?php endfor; ?>
