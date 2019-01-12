<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?>"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"> <!-- Resource style -->
	<script src="<?php echo e(asset('js/modernizr.js')); ?>"></script> <!-- Modernizr -->
	<title>FAQ</title>

</head>
<body>
<header>
	<h1>Часто задаваемые вопросы</h1>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
        <a href="#form">Задать вопрос</a>
        <a href="<?php echo e(url('/admin')); ?>">Я админ</a>
    </div>	
</header>

<section class="cd-faq" id="top">
	<ul class="cd-faq-categories">
		<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><a href="#<?php echo e($category->id); ?>"><?php echo e($category->title); ?></a></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul> 

	<div class="cd-faq-items">		
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<ul id="<?php echo e($category->id); ?>" class="cd-faq-group">
				<li class="cd-faq-title"><h2><?php echo e($category->title); ?></h2></li>

			    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <?php if($question->category_id == $category->id): ?>
					<li>
						<a class="cd-faq-trigger" href="#0"><p><h4><?php echo e($question->name); ?></h4></p><?php echo e($question->description); ?></a>

						<div class="cd-faq-content">				
							<p><?php echo e($question->answer); ?></p>
						</div> 
					</li>                    
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul> 				
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	</div> 
	<a href="#0" class="cd-close-panel">Close</a>

	<div class="cd-faq-items">
		<h2></h2>
	    <form id="form" class="form-horizontal" action="<?php echo e(route('site')); ?>" method="post">
	    	<fieldset class="form">
	    		<legend><h1>Задайте свой вопрос</h1></legend>
	    

	    
	    <?php echo $__env->make('partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
	    <?php echo e(csrf_field()); ?>

	        </fieldset>   
 		</form>
 	</div>	

</section> 

<footer>
	<div class="footer">
		<a href="#top">К началу страницы</a>	
	</div>
</footer>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>