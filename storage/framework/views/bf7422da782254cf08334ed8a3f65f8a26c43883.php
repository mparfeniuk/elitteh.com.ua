<?php $__env->startSection('content'); ?>
<div class="elitteh-pictures">
        <h1><?php echo e($name); ?></h1>
        <?php for($i = 1; $i <= $amount; $i++): ?>
            <a href="/gallery/<?php echo e($folder); ?>/<?php echo e($i); ?>_<?php echo e($i); ?>.jpg" data-lightbox="image-1">
                <div class="gal-img" style="background:url(/gallery/<?php echo e($folder); ?>/thumbs/<?php echo e($i); ?>_<?php echo e($i); ?>.jpg);"></div>
            </a>
        <?php endfor; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('parts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>