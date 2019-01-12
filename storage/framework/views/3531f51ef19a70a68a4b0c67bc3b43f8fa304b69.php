<label for="">Статус</label>
<select class="form-control" name="published">
  <?php if(isset($question->id)): ?>
    <option value="0" <?php if($question->published == 0): ?> selected="" <?php endif; ?>>Не опубликовано</option>
    <option value="1" <?php if($question->published == 1): ?> selected="" <?php endif; ?>>Опубликовано</option>
    <option value="2" <?php if($question->published == 2): ?> selected="" <?php endif; ?>>Скрыто</option>
  <?php else: ?>
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
    <option value="2">Скрыто</option>
  <?php endif; ?>
</select>

<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Введите имя" value="<?php echo e(isset($question->name) ? $question->name : ""); ?>" required>

<label for="">email</label>
<input type="email" class="form-control" name="email" placeholder="Введите email" value="<?php echo e(isset($question->email) ? $question->email : ""); ?>" required>


<label for="">Вопрос</label>
<textarea class="form-control" name="description" placeholder="Текст вопроса" value="<?php echo e(isset($question->description) ? $question->description : ""); ?>" required><?php echo e(isset($question->description) ? $question->description : ""); ?></textarea>

<label for="">Категория вопроса</label>
<select class="form-control" name="category_id">

  <?php echo $__env->make('admin.questions.partials.categories', ['categories' => $categories], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</select>

<label for="">Ответ</label>
<textarea class="form-control" name="answer" placeholder="Текст ответа" value="<?php echo e(isset($question->answer) ? $question->answer : ""); ?>"><?php echo e(isset($question->answer) ? $question->answer : ""); ?></textarea>


<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">