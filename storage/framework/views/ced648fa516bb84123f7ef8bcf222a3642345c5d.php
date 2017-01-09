<script type="text/javascript">
    FusionCharts.ready(function () {
        var <?php echo e($model->id); ?> = new FusionCharts({
            type: 'mscolumn2d',
            renderAt: "<?php echo e($model->id); ?>",
            <?php echo $__env->make('charts::_partials.dimension.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            dataFormat: 'json',
            dataSource: {
                'chart': {
                    <?php if($model->title): ?>
                    'caption': "<?php echo e($model->title); ?>",
                    <?php endif; ?>
                    'yAxisName': "<?php echo e($model->element_label); ?>",
                    'bgColor': '#ffffff',
                    'borderAlpha': '20',
                    'canvasBorderAlpha': '0',
                    'usePlotGradientColor': '0',
                    'plotBorderAlpha': '10',
                    'rotatevalues': '1',
                    'valueFontColor': '#ffffff',
                    'showXAxisLine': '1',
                    'xAxisLineColor': '#999999',
                    'divlineColor': '#999999',
                    'divLineIsDashed': '1',
                    'showAlternateHGridColor': '0',
                    'subcaptionFontBold': '0',
                    'subcaptionFontSize': '14'
                },
                'categories': [{
                    'category': [
                        <?php foreach($model->labels as $l): ?>
                            {
                                'label': "<?php echo e($l); ?>",
                            },
                        <?php endforeach; ?>
                    ]
                }],
                'dataset': [
                    <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                        {
                            'seriesname': "<?php echo e($model->datasets[$i]['label']); ?>",
                            <?php if($model->colors and count($model->colors) > $i): ?>
                                'color': "<?php echo e($model->colors[$i]); ?>",
                            <?php endif; ?>
                            'data': [
                                <?php foreach($model->datasets[$i]['values'] as $v): ?>
                                    {
                                        'value': <?php echo e($v); ?>

                                    },
                                <?php endforeach; ?>
                            ]
                        },
                    <?php endfor; ?>
                ]
            }
        }).render()
    });
</script>

<?php echo $__env->make('charts::_partials.container.div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
