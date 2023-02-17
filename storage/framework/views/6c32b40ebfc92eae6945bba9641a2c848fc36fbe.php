<?php echo $__env->make('charts::_partials.container.div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    var <?php echo e($model->id); ?>;
    $(function() {
        <?php echo e($model->id); ?> = new JustGage({
            id: "<?php echo e($model->id); ?>",
            value: "<?php echo e($model->values[0]); ?>",

            <?php if(count($model->values) >= 2 and $model->values[1] <= $model->values[0]): ?>
                <?php ($min = $model->values[1]); ?>
                min: <?php echo e($min); ?>,
            <?php else: ?>
                <?php ($min = 0); ?>
            <?php endif; ?>

            <?php if(count($model->values) >= 3 and $model->values[2] >= $model->values[0]): ?>
                <?php ($max = $model->values[2]); ?>
                max: <?php echo e($max); ?>,
            <?php else: ?>
                <?php ($max = 100); ?>
            <?php endif; ?>

            donut: true,
            gaugeWidthScale: 0.6,
            counter: true,
            <?php if($model->title): ?>
                title:  "<?php echo $model->title; ?>",
            <?php endif; ?>
            <?php if(count($model->colors) > 0 and is_array($model->colors)): ?>
            	<?php ($colors = '["'.implode(array_slice(array_values($model->colors), 0, 3), '","').'"]'); ?>
                levelColors: <?php echo $colors; ?>,
            <?php endif; ?>
            label: "<?php echo $model->element_label; ?>",
            hideInnerShadow: true
        })
    });
</script>
<?php /**PATH G:\xampp_7\htdocs\ismart_true\vendor\consoletvs\charts\src/../resources/views/justgage/percentage.blade.php ENDPATH**/ ?>