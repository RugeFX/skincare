<?php

namespace App\Http\Controllers;

use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($question)
    {
        $options = QuestionOption::where('question_id', $question)->get();

        return view('admin.question.option', compact('options', 'question'));
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
    public function store(Request $request, $question)
    {
        $validated = $request->validate([
            'label' => 'required',
            'icon' => 'nullable|image|exclude',
            'description' => 'nullable',
        ]);

        $validated['question_id'] = $question;

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('icon/option', 'public');
        }

        QuestionOption::create($validated);

        return redirect()->back()->with('success', 'Berhasil menambahkan data option');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionOption $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionOption $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $question, QuestionOption $option)
    {
        $validated = $request->validate([
            'label' => 'required',
            'icon' => 'nullable|image|exclude',
            'description' => 'nullable',
        ]);

        $validated['question_id'] = $question;

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('icon/option', 'public');
        }

        $update = $option->update($validated);

        if ($update && $option->icon) {
            Storage::disk('public')->delete($option->icon);
        }


        return redirect()->back()->with('success', 'Berhasil mengubah data option');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question, QuestionOption $option)
    {
        if ($option->delete() && $option->icon) {
            Storage::disk('public')->delete($option->icon);
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data option');
    }
}
