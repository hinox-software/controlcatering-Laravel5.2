<?php echo $__env->make('charts::_partials.container.svg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script type="text/javascript">
    $(function() {
        <?php echo $__env->make('charts::minimalist._data.multi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        var xScale = new Plottable.Scales.Category()
        var yScale = new Plottable.Scales.Linear()

        var plot = new Plottable.Plots.ClusteredBar()
            <?php for($i = 0; $i < count($model->datasets); $i++): ?>
                .addDataset(new Plottable.Dataset(s<?php echo e($i); ?>))
            <?php endfor; ?>
            .x(function(d) { return d.x; }, xScale)
            .y(function(d) { return d.y; }, yScale)
            <?php if($model->colors): ?>
                .attr('stroke', "<?php echo e($model->colors[0]); ?>")
                .attr('fill', "<?php echo e($model->colors[0]); ?>")
            <?php endif; ?>
            .renderTo('svg#<?php echo e($model->id); ?>')

        window.addEventListener('resize', function() {
            plot.redraw()
        })
    });
</script>
