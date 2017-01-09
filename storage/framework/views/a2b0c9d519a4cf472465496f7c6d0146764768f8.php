<script type="text/javascript">
    $(function () {
        var <?php echo e($model->id); ?> = new Highcharts.Chart({
            chart: {
                renderTo:  "<?php echo e($model->id); ?>",
                <?php echo $__env->make('charts::_partials.dimension.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column'
            },
            <?php if($model->title): ?>
                title: {
                    text:  "<?php echo e($model->title); ?>"
                },
            <?php endif; ?>
            <?php if(!$model->credits): ?>
                credits: {
                    enabled: false
                },
            <?php endif; ?>
            plotOptions: {
               column: {
                   pointPadding: 0.2,
                   borderWidth: 0
               }
           },
           xAxis: {
                categories: [
                    <?php foreach($model->labels as $label): ?>
                         "<?php echo e($label); ?>",
                    <?php endforeach; ?>
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                    text:  "<?php echo e($model->element_label); ?>"
                },
            },
            series: [{
                name: "<?php echo e($model->element_label); ?>",
                data: [
                    <?php foreach($model->values as $dta): ?>
                        <?php echo e($dta); ?>,
                    <?php endforeach; ?>
                ]
            }]
        })
    });
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
