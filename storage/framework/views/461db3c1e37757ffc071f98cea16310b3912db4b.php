<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.canvas2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<script type="text/javascript">
    var ctx = document.getElementById("<?php echo e($model->id); ?>")
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php foreach($model->labels as $label): ?>
                    "<?php echo e($label); ?>",
                <?php endforeach; ?>
            ],
            datasets: [
                <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                    {
                        fill: true,
                        label: "<?php echo e($model->datasets[$i]['label']); ?>",
                        lineTension: 0.3,
                        <?php if($model->colors and count($model->colors) > $i): ?>
                            borderColor: "<?php echo e($model->colors[$i]); ?>",
                            backgroundColor: "<?php echo e($model->colors[$i]); ?>",
                        <?php else: ?>
                            $c = sprintf('#%06X', mt_rand(0, 0xFFFFFF))
                            borderColor: "<?php echo e($c); ?>",
                            backgroundColor: "<?php echo e($c); ?>",
                        <?php endif; ?>
                        data: [
                            <?php foreach($model->datasets[$i]['values'] as $dta): ?>
                                <?php echo e($dta); ?>,
                            <?php endforeach; ?>
                        ],
                    },
                <?php endfor; ?>
            ]
        },
        options: {
            responsive: <?php echo e($model->responsive || !$model->width ? 'true' : 'false'); ?>,
            maintainAspectRatio: false,
                <?php if($model->title): ?>
                    title: {
                display: true,
                    text: "<?php echo e($model->title); ?>",
                    fontSize: 20,
            },
            <?php endif; ?>
                scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });
</script>
