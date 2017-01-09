<script type="text/javascript">
    $(function () {
        var <?php echo e($model->id); ?> = new Highcharts.Chart({
            chart: {
                renderTo: "<?php echo e($model->id); ?>",
                <?php echo $__env->make('charts::_partials.dimension.js2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
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
            tooltip: {
                pointFormat: '{point.y} <b>({point.percentage:.1f}%)</strong>'
            },
            plotOptions: {
                pie: {
                    innerSize: '50%',
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</strong>: {point.y} ({point.percentage:.1f}%)',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                colorByPoint: true,
                data: [
                    <?php for($l = 0; $l < count($model->values); $l++): ?>
                        {
                            name: "<?php echo e($model->labels[$l]); ?>",
                            y: <?php echo e($model->values[$l]); ?>

                        },
                    <?php endfor; ?>
                ]
            }]
        })
    });
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
