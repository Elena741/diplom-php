<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Question;
use DB;

class IndexController extends Controller
{


    public function execute(Category $categories, Question $questions, Request $request) {
       
 
        If($request->isMethod('post')) {

            Question::create($request->all());
            
            return redirect()->route('site');
        }

        $categories = Category::has('questions')->where('published', 1)->get();
    	$questions = Question::where('published', 1)->whereNotNull('answer')->get();
        $categoriesAll = Category::where('published', 1)->get();

    	return view('welcomeIndex') -> with([
    		'categories' => $categories,
    		'questions' => $questions,
            'categoriesAll' => $categoriesAll
    	]);
    }

}