<?php $__env->startSection('page_title', 'crea'); ?>


<?php $__env->startSection('content'); ?>
  <div class="container mt-5">

    <h1>Inserisci un nuovo post</h1>

    <form method="post" action="<?php echo e(route('admin.posts.store')); ?>">
      
      <?php echo csrf_field(); ?>
    <div class="form-group">
      <label for="title">Titolo post</label>
      <input type="text" class="form-control" name="title" placeholder="Inserisci il titolo" value="<?php echo e(old('title')); ?>">
      
      <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label for="content">Testo</label>
      <textarea name="content" class="form-control" placeholder="Inserisci il testo" rows="8" cols="80"><?php echo e(old('content')); ?></textarea>
      <?php if ($errors->has('content')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('content'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" name="author" placeholder="Inserisci l'autore" value="<?php echo e(old('author')); ?>">
      <?php if ($errors->has('author')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('author'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label for="category_id">Categoria</label>
      <select class="form-control" name="category_id">
        <option value="">Seleziona la categoria</option>
        
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </select>
      <?php if ($errors->has('category_id')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_id'); ?>
        <div class="alert alert-danger"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
    <div class="form-group">
      <label>Tag: </label>
      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        
        <label><input type="checkbox" name="tag[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/Es_7_17_Luglio_boolpress/resources/views/admin/posts/create.blade.php ENDPATH**/ ?>