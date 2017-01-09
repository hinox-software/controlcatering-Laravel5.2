<script type="text/javascript">
    $(function () {
        var <?php echo e($model->id); ?> = new Highcharts.Chart({
            chart: {
                type: 'area',
                renderTo:  "<?php echo e($model->id); ?>",
                <?php echo $__env->make('charts::_partials.dimension.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            },
            <?php if($model->title): ?>
                title: {
                    text:  "<?php echo e($model->title); ?>",
                    x: -20 //center
                },
            <?php endif; ?>
            <?php if(!$model->credits): ?>
                credits: {
                    enabled: false
                },
            <?php endif; ?>    
            xAxis: {
                categories: [
                    <?php foreach($model->labels as $label): ?>
                        "<?php echo e($label); ?>",
                    <?php endforeach; ?>
                ]
            },
            yAxis: {
                title: {
                    text: "<?php echo e($model->element_label); ?>"
                },
                plotLines: [{
                    value: 0,
                    height: 0.5,
                    width: 1,
                    color: '#808080'
                }]
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    {
                        name:  "<?php echo e($model->datasets[$i]['label']); ?>",
                        <?php if($model->colors && count($model->colors) > $i): ?>
                            color: "<?php echo e($model->colors[$i]); ?>",
                        <?php endif; ?>
                        data: [
                            <?php foreach($model->datasets[$i]['values'] as $dta): ?>
                                <?php echo e($dta); ?>,
                            <?php endforeach; ?>
                        ]
                    },
                <?php endfor; ?>
            ]
        })
    });
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
