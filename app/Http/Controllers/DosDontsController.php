<?php

namespace App\Http\Controllers;

use App\Models\DosDonts;
use App\Models\QuestionOption;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DosDontsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosDonts = DosDonts::all();
        $skin_conditions = QuestionOption::select('label')->whereHas('question', function (Builder $query) {
            $query->where('label', 'skin_condition');
        })->get();
        $skin_dreams = QuestionOption::select('label')->whereHas('question', function (Builder $query) {
            $query->where('label', 'skin_dream');
        })->get();

        return view('admin.dosdonts.index', compact('dosDonts', 'skin_conditions', 'skin_dreams'));
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
            'group' => 'required|in:dos,donts',
            'skin_condition' => 'required',
            'skin_dream' => 'required',
            'todo' => 'required',
        ]);

        DosDonts::create($validated);

        return redirect()->back()->with('success', "Berhasil menambahkan data {$validated['group']}");
    }

    /**
     * Display the specified resource.
     */
    public function show(DosDonts $dos_dont)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DosDonts $dos_dont)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DosDonts $dos_dont)
    {
        $validated = $request->validate([
            'group' => 'required|in:dos,donts',
            'skin_condition' => 'required',
            'skin_dream' => 'required',
            'todo' => 'required',
        ]);

        $dos_dont->update($validated);

        return redirect()->back()->with('success', "Berhasil mengubah data {$validated['group']}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DosDonts $dos_dont)
    {
        $dos_dont->delete();

        return redirect()->back()->with('success', "Berhasil menghapus data {$dos_dont['group']}");
    }
}
