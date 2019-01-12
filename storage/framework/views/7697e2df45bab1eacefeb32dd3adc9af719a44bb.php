<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="row">
				<div class="col-sm-6">
					<a class="btn btn-block btn-default" href="<?php echo e(route('admin.category.index')); ?>">Создать категорию</a>
					<a class="list-group-item" href="<?php echo e(route('admin.category.index')); ?>">
						<h4 class="list-group-item-heading">Создано категорий - <?php echo e($categories->count()); ?></h4>
					</a>

						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							  <form class="form-horizontal" action="<?php echo e(route('admin.questions.show')); ?>" method="post">
							    <input type="hidden" name="category" value="<?php echo e($category->id); ?>">
							    <input type="hidden" name="categoryTitle" value="<?php echo e($category->title); ?>">
							    <?php echo e(csrf_field()); ?>

							    <input class="show" style="width: 100%; text-align: left; font-style: italic;" type="submit" name="" value="<?php echo e($category->title); ?> - <?php echo e($category->questions->count()); ?> вопр.">  
							  </form>		

							<p style="font-size: 13px; margin: 5px 0 10px 15px;" class="text">
								Опубликовано - <?php echo e($category->questions->where('published', 1)->count()); ?> / 
								Ждут ответа - <?php echo e($category->questions->where('published', 0)->count()); ?> / 
								Скрыто - <?php echo e($category->questions->where('published', 2)->count()); ?>

							</p>
							
							</a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
				</div>

				<div class="col-sm-6">
					<a class="btn btn-block btn-default" href="<?php echo e(route('admin.question.index')); ?>">Создать вопрос</a>
					<a class="list-group-item" href="<?php echo e(route('admin.questions.showAllNullAnswer')); ?>">
						<h4 class="list-group-item-heading">Вопросы без ответов - <?php echo e($countNull); ?></h4>
					</a>
					
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<form class="form-horizontal" action="<?php echo e(route('admin.questions.showNullAnswer')); ?>" method="post">
							    <input type="hidden" name="category" value="<?php echo e($category->id); ?>">
							    <input type="hidden" name="categoryTitle" value="<?php echo e($category->title); ?>">
							    <?php echo e(csrf_field()); ?>

							    <input class="show" style="width: 100%; text-align: left; font-style: italic;" type="submit" name="" value="<?php echo e($category->title); ?>">
							   
							  </form>
							  <p style="font-size: 13px; margin: 5px 0 10px 15px;" class="text">
								Ждут ответа - <?php echo e($category->questions->where('published', 0)->count()); ?>		
							</p>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
				</div>
			
			</div>
		</div>		
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>