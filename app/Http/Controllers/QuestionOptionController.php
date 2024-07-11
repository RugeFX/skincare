<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderByRaw('FIELD(`group`, "kulit", "gaya-hidup")')
            ->orderBy('order', 'asc')
            ->get();
        $questions->loadCount('options');

        return view('admin.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required',
            'icon' => 'nullable|image|exclude',
            'question' => 'required',
            'group' => 'required|in:kulit,gaya-hidup',
            'description' => 'nullable',
            'answer_type' => 'required',
            'order' => 'required'
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('icon/question', 'public');
        }

        Question::create($validated);

        return redirect()->back()->with('success', "Berhasil menambahkan pertanyaan pada group {$validated['group']}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'label' => 'required',
            'icon' => 'nullable|image|exclude',
            'question' => 'required',
            'group' => 'required|in:kulit,gaya-hidup',
            'description' => 'nullable',
            'answer_type' => 'required',
            'order' => "required"
        ]);

        if ($request->hasFile('icon')) {
            if ($question->icon) {
                Storage::disk('public')->delete($question->icon);
            }

            $validated['icon'] = $request->file('icon')->store('icon/question', 'public');
        }

        $question->update($validated);


        return redirect()->back()->with('success', "Berhasil mengubah data pertanyaan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        if ($question->delete() && $question->icon) {
            Storage::disk('public')->delete($question->icon);
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data question');
    }
}
