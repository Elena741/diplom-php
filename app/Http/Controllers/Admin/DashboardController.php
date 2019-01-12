<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {

    	$categories = Category::withCount('questions')->get();
    	$questions = Question::get();
    	$countNull = Question::whereNull('answer')->count();
     	$questions2 = Question::where('published', 2)->get();


    	return view('admin.dashboard') -> with([
    		'categories' => $categories,
    		'questions' => $questions,
    		'countNull' => $countNull,
    		'questions2' => $questions2
    	]);
    }

		// Отображение всех вопросов в конкретной категории
    public function show(Question $question, Category $category, Request $request) {
        return view('admin.questions.show', [
        	'categories' => Category::get(),
        	'request' => $request,
        	'questions'  => Question::where('category_id', $request->category)-> paginate(10)      
        ]);
    }

    // Отображение всех вопросов без ответов
    public function showAllNullAnswer(Question $question, Category $category, Request $request) {    	

    	return view('admin.questions.showAllNullAnswer', [
        	'categories' => Category::get(),
        	'request' => $request,
        	'questions' => Question::whereNull('answer')-> paginate(10)     
        ]);
    }

    // Отображение всех вопросов без ответов в конкретной категории
    public function showNullAnswer(Question $question, Category $category, Request $request) {
    	
    	return view('admin.questions.showNullAnswer', [
        	'categories' => Category::get(),
        	'request' => $request,
        	'questions' => Question::where('category_id', $request->category)->whereNull('answer')-> paginate(10)     
        ]);
    }
}
