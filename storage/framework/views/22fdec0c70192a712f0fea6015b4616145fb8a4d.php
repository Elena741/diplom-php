<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>


<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Введите имя" value="<?php if(old('name')): ?><?php echo e(old('name')); ?><?php else: ?><?php echo e(isset($user->name) ? $user->name : ""); ?><?php endif; ?>" required>

<label for="">email</label>
<input type="email" class="form-control" name="email" placeholder="Введите email" value="<?php if(old('email')): ?><?php echo e(old('email')); ?><?php else: ?><?php echo e(isset($user->email) ? $user->email : ""); ?><?php endif; ?>" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password">

<label for="">Подтверждение пароля</label>
<input type="password" class="form-control" name="password_confirmation">


<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">