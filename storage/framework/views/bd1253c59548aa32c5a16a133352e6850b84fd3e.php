<?php echo $__env->make('charts::_partials.container.div-titled', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">
    $(function (){
        Morris.Bar({
            element: "<?php echo e($model->id); ?>",
            resize: true,
            data: [
                <?php for($k = 0; $k < count($model->labels); $k++): ?>
                    {
                        x: "<?php echo e($model->labels[$k]); ?>",
                        <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                            s<?php echo e($i); ?>: "<?php echo e($model->datasets[$i]['values'][$k]); ?>",
                        <?php endfor; ?>
                    },
                <?php endfor; ?>
            ],
            xkey: 'x',
            labels: [
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    "<?php echo e($model->datasets[$i]['label']); ?>",
                <?php endfor; ?>
            ],
            ykeys: [
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    "s<?php echo e($i); ?>",
                <?php endfor; ?>
            ],
            hideHover: 'auto',
            parseTime: false,
            <?php if($model->colors): ?>
                barColors: [
                    <?php foreach($model->colors as $c): ?>
                        "<?php echo e($c); ?>",
                    <?php endforeach; ?>
                ],
            <?php endif; ?>
        })
    });
</script>
