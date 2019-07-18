<?php $__env->startSection('content'); ?>
  <div class="container mt-5">
    <h1><?php echo e($post->title); ?></h1>
    <p><?php echo e($post->content); ?></p>
    <h3><?php echo e($post->author); ?></h3>
    <small><?php echo e($post->created_at); ?></small>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_7_17_Luglio_boolpress/resources/views/posts/show_public.blade.php ENDPATH**/ ?>