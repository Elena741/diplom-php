<?php $__env->startSection('content'); ?>
	<div class="container">
		<?php $__env->startComponent('admin.components.breadcrumb'); ?>
		<?php $__env->slot('title'); ?> Список пользователей <?php $__env->endSlot(); ?>
		<?php $__env->slot('parent'); ?> Главная <?php $__env->endSlot(); ?>
		<?php $__env->slot('active'); ?> Пользователи <?php $__env->endSlot(); ?>
		<?php echo $__env->renderComponent(); ?>

		<hr>
		<a href="<?php echo e(route('admin.user_managment.user.create')); ?>" class="btn btn-primary pull-right">Создать пользователя</a>
		<table class="table table-striped">
			<thead>
				<th>Имя</th>
				<th>Еmail</th>

				<th class="text-right">Действие</th>
			</thead>
			<tbody>
				<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<tr>
						<td><?php echo e($user->name); ?></td>
						<td><?php echo e($user->email); ?></td>

						<td class="text-right">
							<form onsubmit="if (confirm('Удалить?')) {return true} else {return false}" action="<?php echo e(route('admin.user_managment.user.destroy', $user)); ?>" method="post">
								<?php echo e(method_field('DELETE')); ?>

								<?php echo e(csrf_field()); ?>


							<a class="btn btn-default" href="<?php echo e(route('admin.user_managment.user.edit', $user)); ?>"><i class="fa fa-edit"></i></a>	

								<button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
							</form>
							
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td colspan="3" class="text-center"><h2>Данных нет</h2></td>
					</tr>
				<?php endif; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3">
						<ul class="pagination pull-right">
							<?php echo e($users->links()); ?>

						</ul>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>