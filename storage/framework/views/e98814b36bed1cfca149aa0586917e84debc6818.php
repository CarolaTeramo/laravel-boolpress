<?php $__env->startSection('content'); ?>
  <div class="container">
    <h1>Post per tag : <?php echo e($tags->name); ?></h1>
    
    <table class="table mt-3">
  <thead>
    <tr>
      <th >Titolo</th>
      <th >Autore</th>
      <th >Creato il</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><a href="<?php echo e(route('posts.show_public', $post->slug)); ?>"><?php echo e($post->title); ?></a></td>
        <td><?php echo e($post->author); ?></td>
        <td><?php echo e($post->created_at); ?></td>
      </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>Non ci sono film</p>
    <?php endif; ?>

  </tbody>
</table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_7_17_Luglio_boolpress/resources/views/posts/posts_of_x_tags.blade.php ENDPATH**/ ?>