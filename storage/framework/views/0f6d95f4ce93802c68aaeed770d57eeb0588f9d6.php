<?php $__env->startSection('content'); ?>
  <h1>Pagina home area pubblica</h1>
  <ul>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      
      <li><a href="<?php echo e(route('posts.show_public',$post->slug)); ?>"><?php echo e($post->title); ?></a> scritto da <?php echo e($post->author); ?> del <?php echo e($post->created_at); ?></li>
      <?php if(!empty($post->category)): ?>
        <li><a href="<?php echo e(route('posts.posts_of_x_category', $post->category->slug)); ?>"><?php echo e($post->category->name); ?></a></li>
        <?php else: ?>
          (null)
      <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>Non sono presenti post</p>
    <?php endif; ?>
  </ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_7_17_Luglio_boolpress/resources/views/home_public.blade.php ENDPATH**/ ?>