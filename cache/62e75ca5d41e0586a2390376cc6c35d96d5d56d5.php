<ul id="slide-out-<?php echo e($id); ?>" class="sidenav">
    <li><a href="#!" class="close-side-nav"><i class="material-icons">arrow_back</i> Back</a></li>
    <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e($link->url); ?>" data-target="slide-out-<?php echo e($link->id); ?>" class="open-side-nav"><?php echo e($link->title); ?></a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</ul>