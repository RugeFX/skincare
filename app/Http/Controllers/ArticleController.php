<?php

namespace App\Http\Controllers;

use App\Models\Article;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumbnail' => 'required|image|exclude',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('article/thumbnail', 'public');
        }

        // Save content image
        libxml_use_internal_errors(true); // Suppress warnings during HTML loading
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            // Check if the image is new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $filename = "article/content/" . uniqid() . ".png";
                Storage::disk('public')->put($filename, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::url($filename));
            }
        }
        $validated['content'] = $dom->saveHTML($dom->documentElement);

        Article::create($validated);

        return redirect()->route('admin.article.index')->with('success', 'Berhasil menambahkan data article');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $title = $article->title;
        return view('article', compact('article', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|exclude',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('article/thumbnail', 'public');
        }

        // Save content image
        libxml_use_internal_errors(true); // Suppress warnings during HTML loading
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($request->content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            // Check if the image is new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $filename = "article/content/" . uniqid() . ".png";
                Storage::disk('public')->put($filename, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::url($filename));
            }
        }
        $validated['content'] = $dom->saveHTML($dom->documentElement);

        $article->update($validated);

        if ($request->hasFile('thumbnail') && $article->thumbail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        return redirect()->route('admin.article.index')->with('success', 'Berhasil mengubah data article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->delete()) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            libxml_use_internal_errors(true); // Suppress warnings during HTML loading
            $dom = new DOMDocument();
            $dom->loadHTML(mb_convert_encoding($article->content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                $path = \Str::of($src)->after('/');
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }

        return redirect()->route('admin.article.index')->with('success', 'Berhasil menghapus data article');
    }

    public function deleteMedia(Request $request)
    {
        $path = $request->input('path');

        // Remove storage path prefix
        $relativePath = str_replace(url('/storage'), '', $path);

        // Delete the image from storage
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }

        return response()->json(['success' => true]);
    }
}
