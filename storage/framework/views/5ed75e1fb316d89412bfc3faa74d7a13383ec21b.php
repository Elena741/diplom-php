<div class="row">
<label for="">Имя</label>
<input type="text" class="form-control field" name="name" placeholder="Введите имя" value="" required>
</div>

<div class="row">
<label for="">email</label>
<input type="email" class="form-control field" name="email" placeholder="Введите email" value="" required>
</div>

<div class="row">
<label for="">Вопрос</label>
<textarea class="form-control field" name="description" placeholder="Текст вопроса" value="" required></textarea>
</div>

<div class="row">
<label for="">Категория вопроса</label>
<select class="form-control field" name="category_id">

  <?php echo $__env->make('partials.categories', ['categories' => $categories], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</select>
</div>

<input type="hidden" name="published" value="0">

<input class="btn btn-primary " type="submit" value="Сохранить">