<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('pages.dashboard.article.index', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'thumbnail_img' => 'required|file|image|mimes:jpeg,jpg,png',
            'content' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'thumbnail_img.required' => 'Gambar harus diisi',
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
            'thumbnail_img.mimes' => 'Thumbnail harus berupa file dengan tipe: jpeg, jpg, png',
            'content.required' => 'Konten harus diisi',
        ]);

        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('thumbnails'), $fileName);
            $validated['thumbnail_img'] = $fileName;
        }

        Article::create($validated);

        return redirect()->back()->with('toast_success', 'Article created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'thumbnail_img' => 'nullable|file|image',
            'content' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
            'content.required' => 'Konten harus diisi',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('thumbnail_img')) {
            if ($article->thumbnail_img && file_exists(public_path('thumbnails/' . $article->thumbnail_img))) {
                unlink(public_path('thumbnails/' . $article->thumbnail_img));
            }

            $file = $request->file('thumbnail_img');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('thumbnails'), $fileName);
            $validated['thumbnail_img'] = $fileName;
        }

        $article->update($validated);

        return redirect()->back()->with('toast_success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Article deleted successfully');
    }
}
