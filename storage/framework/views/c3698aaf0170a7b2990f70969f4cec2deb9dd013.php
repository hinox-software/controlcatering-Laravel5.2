<script type="text/javascript">
    google.charts.setOnLoadCallback(draw<?php echo e($model->id); ?>)

    function draw<?php echo e($model->id); ?>() {
        var data = google.visualization.arrayToDataTable([
            [
                'Element',
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    "<?php echo e($model->datasets[$i]['label']); ?>",
                <?php endfor; ?>
            ],
            <?php for($l = 0; $l < count($model->labels); $l++): ?>
                [
                    "<?php echo e($model->labels[$l]); ?>",
                    <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                        <?php echo e($model->datasets[$i]['values'][$l]); ?>,
                    <?php endfor; ?>
                ],
            <?php endfor; ?>
        ])

        var options = {
            <?php echo $__env->make('charts::_partials.dimension.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            legend: { position: 'top', alignment: 'end' },
            fontSize: 12,
            <?php if($model->title): ?>
                title: "<?php echo e($model->title); ?>",
            <?php endif; ?>
            <?php if($model->colors): ?>
                colors:[
                    <?php foreach($model->colors as $color): ?>
                        "<?php echo e($color); ?>",
                    <?php endforeach; ?>
                ],
            <?php endif; ?>
        };

        var <?php echo e($model->id); ?> = new google.visualization.ColumnChart(document.getElementById("<?php echo e($model->id); ?>"))

        <?php echo e($model->id); ?>.draw(data, options)
    }
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
