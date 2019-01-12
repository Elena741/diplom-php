<!-- 

<?php $__env->startSection('content'); ?> -->

<div class="container">
<!-- 
  <?php $__env->startComponent('admin.components.breadcrumb'); ?>
    <?php $__env->slot('title'); ?> Создание вопроса <?php $__env->endSlot(); ?>
    <?php $__env->slot('parent'); ?> Главная <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Вопросы <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
 -->
  <hr />

  <form class="form-horizontal" action="<?php echo e(route('store')); ?>" method="post">
    <?php echo e(csrf_field()); ?>


    
    <?php echo $__env->make('partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
  </form>
</div>
<!-- 
<?php $__env->stopSection(); ?> -->
<?php echo $__env->make('admin.layouts.app_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>