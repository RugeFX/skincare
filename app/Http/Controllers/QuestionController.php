<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\DosDonts;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('answer')) {
            return redirect()->route('result');
        }

        $questions = Question::orderByRaw('FIELD(`group`, "kulit", "gaya-hidup")')
            ->orderBy('order', 'asc')
            ->get();

        $step = $request->session()->get('step', 1);
        $totalStep = 3 + $questions->count() + 1;
        $request->session()->put('totalStep', $totalStep);

        $question = null;
        if ($step > 3 && $step < $totalStep) {
            $questions->load('options')->loadCount('options');
            $current = $step - 4;
            if ($current >= 0 && $current < $questions->count()) {
                $question = $questions->skip($current)->first();
            }
        }


        return view('question.index', compact('step', 'question'));
    }

    public function nextQuestion(Request $request)
    {
        $step = $request->session()->get('step', 1);
        $totalStep = $request->session()->get('totalStep');

        switch ($step) {
            case 1:
                $request->validate(['name' => 'required']);
                $request->session()->put('name', $request->input('name'));
                $request->session()->put('step', 2);
                break;

            case 2:
                $request->validate(['age' => 'required|integer']);
                $request->session()->put('age', $request->input('age'));
                $request->session()->put('step', 3);
                break;

            case 3:
                $request->validate(['gender' => 'required|in:Pria,Wanita,Secret']);
                $request->session()->put('gender', $request->input('gender'));
                $request->session()->put('step', 4);
                break;

            case $totalStep:
                $body = [
                    'name' => $request->session()->get('name'),
                    'age' => $request->session()->get('age'),
                    'gender' => $request->session()->get('gender'),
                    'skin_condition' => $request->session()->get('skin_condition'),
                    'skin_dream' => json_encode($request->session()->get('skin_dream')),
                ];

                $answer = Answer::create($body);

                $request->session()->forget(['step', 'name', 'age', 'gender', 'skin_condition', 'skin_dream']);
                $request->session()->put('answer', [
                    'skin_condition' => $answer->skin_condition,
                    'skin_dream' => $answer->skin_dream,
                ]);
                return redirect()->route('result');
                // return redirect()->back();
                break;

            default:
                if ($request->label == 'skin_condition') {
                    if ($request->has('skin_condition')) {
                        $request->session()->put('skin_condition', $request->input('skin_condition'));
                    } else {
                        $request->validate(['skin_condition' => 'required']);
                    }
                }

                if ($request->label == 'skin_dream') {
                    if ($request->has('skin_dream')) {
                        $request->session()->put('skin_dream', $request->input('skin_dream'));
                    } else {
                        $request->validate(['skin_dream' => 'required']);
                    }
                }

                $request->session()->increment('step');
        }

        return redirect()->route('question');
    }

    public function prevQuestion(Request $request)
    {
        $request->session()->decrement('step');
        return redirect()->route('question');
    }

    public function result(Request $request)
    {
        $answer = $request->session()->get('answer');
        if (!$answer) {
            $request->session()->flush();
            return redirect('/');
        }

        $category = Category::where('name', $answer['skin_condition'])->first();
        $dosDonts = DosDonts::where('skin_condition', $answer['skin_condition'])
            ->whereIn('skin_dream', json_decode($answer['skin_dream']))
            ->get();

        return view('question.result', compact('category', 'dosDonts'));
    }

    public function reset(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('question');
    }
}
