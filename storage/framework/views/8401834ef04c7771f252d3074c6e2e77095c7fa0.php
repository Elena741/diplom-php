<?php $__env->startSection('content'); ?>

<div class="container">

  <?php $__env->startComponent('admin.components.breadcrumb'); ?>
    <?php $__env->slot('title'); ?> Редактирование пользователя <?php $__env->endSlot(); ?>
    <?php $__env->slot('parent'); ?> Главная <?php $__env->endSlot(); ?>
    <?php $__env->slot('active'); ?> Пользователи <?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>

  <hr />

  <form class="form-horizontal" action="<?php echo e(route('admin.user_managment.user.update', $user)); ?>" method="post">
    <?php echo e(method_field('PUT')); ?>

    <?php echo e(csrf_field()); ?>


    
    <?php echo $__env->make('admin.user_managment.users.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
  </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>