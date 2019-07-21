<?php $__env->startSection('content'); ?>
  <div class="container mt-5">
    <h1>Pagina pubblica</h1>
    <table class="table mt-3">
  <thead>
    <tr>
      <th >Id</th>
      <th >Titolo</th>
      <th >Autore</th>
      <th >Slug</th>
      <th >Creato il</th>
      <th >Categoria</th>
      <th >Tag</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($post->id); ?></td>
        <td><a href="<?php echo e(route('posts.show_public', $post->slug)); ?>"><?php echo e($post->title); ?></a></td>
        <td><?php echo e($post->author); ?></td>
        <td><?php echo e($post->slug); ?></td>
        <td><?php echo e($post->created_at); ?></td>
        <td>
          
            

            <?php if(!empty($post->category)): ?>
              <a href="<?php echo e(route('posts.posts_of_x_category', $post->category->slug)); ?>"><?php echo e($post->category->name); ?></a>
              <?php else: ?>
                (-)
            <?php endif; ?>

          
        </td>
        <td>
          
          <?php if(($post->tags)->isNotEmpty()): ?>

            
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <a href="<?php echo e(route('posts.posts_of_x_tags', $tag->slug)); ?>">

                <?php echo e($tag->name); ?>

                
                <?php if(!$loop->last): ?>
                  ,
                <?php endif; ?>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php else: ?>
            (-)
          <?php endif; ?>
        </td>
      </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>Non ci sono post</p>
    <?php endif; ?>

  </tbody>
</table>

  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_7_17_Luglio_boolpress/resources/views/home_public.blade.php ENDPATH**/ ?>