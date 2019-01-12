@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">
		@component('admin.components.breadcrumb')
		@slot('title') Список вопросов без ответов @endslot
		@slot('parent') Главная @endslot
		@slot('active') Вопросы без ответов в категории "{{$request->categoryTitle}}" @endslot
		@endcomponent

		<hr>
		<a href="{{route('admin.question.create')}}" class="btn btn-primary pull-right">Создать вопрос</a>
		<table class="table table-striped">
			<thead>
				<th>Имя</th>
				<th>email</th>
				<th>Вопрос</th>
				<th>Ответ</th>
				<th>Статус</th>
				<th>Категория</th>
				<th class="text-right">Действие</th>
			</thead>
			<tbody>


				@forelse ($questions as $question)
					<tr>
						<td>{{$question->name}}</td>
						<td>{{$question->email}}</td>
						<td>{{$question->description}}</td>
						<td>{{$question->answer}}</td>
						<td>{{$question->published}}</td>
						<td>{{$question->category->title}}</td>
						<td class="text-right">
							<form onsubmit="if (confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.question.destroy', $question)}}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								{{ csrf_field() }}

							<a class="btn btn-default" href="{{ route('admin.question.edit', $question) }}"><i class="fa fa-edit"></i></a>	

								<button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
							</form>
							
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="3" class="text-center"><h2>Данных нет</h2></td>
					</tr>
				@endforelse
			</tbody>
			{{ $questions->render() }}
		</table>
		
	</div>
@endsection