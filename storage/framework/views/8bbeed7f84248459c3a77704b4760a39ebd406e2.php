
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <?php if(isset($question->category->id)): ?>
    <option value="<?php echo e(isset($category->id) ? $category->id : ""); ?>" <?php if($question->category->id == $category->id): ?> selected="" <?php endif; ?>><?php echo e(isset($category->title) ? $category->title : ""); ?></option>
  <?php else: ?>
  <option  value="<?php echo e(isset($category->id) ? $category->id : ""); ?>" >
    <?php echo isset($delimiter) ? $delimiter : ""; ?><?php echo e(isset($category->title) ? $category->title : ""); ?>

  </option>
  <?php endif; ?>
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>