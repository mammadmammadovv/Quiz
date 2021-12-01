<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish')->where(function($query){
            $query->whereNull('finished_date')->orWhere('finished_date','>',now());
        })->withCount('questions')->paginate(5);

        $results = auth()->user()->results;
        return view('dashboard' , compact('quizzes','results'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions.myAnswer','myResult')->first() ?? abort(404, "Quiz tapılmadı...");
        if($quiz->myResult){
            return view('quiz_result',compact('quiz'));
        }
        return view('quiz',compact('quiz'));
    }

    public function quiz_detail($slug){
        $quiz = Quiz::whereSlug($slug)->with('myResult','topTen.user')->withCount('questions')->first() ?? abort(404, 'Quiz tapılmadı...');
        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz tapılmadı...');
        $correct = 0;

        if($quiz->myResult){
            abort(404, "Bu quizə daha öncə qatıldınız...");
        }

        foreach ($quiz->questions as $item) {
           Answer::create([
               'user_id'=>auth()->user()->id,
               'question_id'=>$item->id,
               'answer'=>$request->post($item->id)
           ]);

           //echo $item->correct_answer .'-'. $request->post($item->id).'<br>';

           if($item->correct_answer === $request->post($item->id)){
               $correct++;
           }
        }

        $point = round((100 / count($quiz->questions)) * $correct);
        $wrong = count($quiz->questions) - $correct;
        
        Result::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'point'=>$point,
            'correct'=>$correct,
            'wrong'=>$wrong
        ]);

        return redirect()->route('quiz_detail',$quiz->slug)->withSuccess('Quizi uğurla tamamladınız. Topladığınız bal: '.$point);
    }
}
