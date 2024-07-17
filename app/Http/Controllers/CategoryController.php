<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'tipe' => 'required',
            'penyebab' => 'nullable',
            'karakteristik' => 'required',
            'skincare' => 'required',
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->tipe = $validated['tipe'];
        $category->penyebab = $validated['penyebab'];
        $category->karakteristik = $validated['karakteristik'];
        $category->skincare = $validated['skincare'];
        dd($category);
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Berhasil menambahkan data category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
            'tipe' => 'required',
            'penyebab' => 'nullable',
            'karakteristik' => 'required',
            'skincare' => 'required',
        ]);

        $category->name = $validated['name'];
        $category->tipe = $validated['tipe'];
        $category->penyebab = $validated['penyebab'];
        $category->karakteristik = $validated['karakteristik'];
        $category->skincare = $validated['skincare'];
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Berhasil mengubah data category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data category');
    }
}
