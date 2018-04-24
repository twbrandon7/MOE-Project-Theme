<nav class="lighten-1" style="background-color:rgb(89, 73, 63);height:50px;line-height:50px;margin-top:-20px;" role="navigation">
    <div class="nav-wrapper container">
      <div>
        <ul class="hide-on-med-and-down">
          <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e($link->url); ?>" data-target="slide-out-<?php echo e($link->id); ?>" class="open-side-nav"><?php echo e($link->title); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <ul id="nav-mobile" class="sidenav">
          <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e($link->url); ?>" data-target="slide-out-<?php echo e($link->id); ?>" class="open-side-nav"><?php echo e($link->title); ?></a>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
      </div>
    </div>
</nav>