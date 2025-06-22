<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayAboutGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DisplayAboutGaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $displayAboutGaleries = DisplayAboutGalery::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-about-galery.index', compact('displayAboutGaleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thumbnail_img' => 'required|file|image|mimes:jpeg,jpg,png',
        ], [
            'thumbnail_img.required' => 'Gambar harus diisi',
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
            'thumbnail_img.mimes' => 'Thumbnail harus berupa file dengan tipe: jpeg, jpg, png',
        ]);

        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('thumbnails'), $fileName);
            $validated['thumbnail_img'] = $fileName;
        }

        DisplayAboutGalery::create($validated);

        return redirect()->back()->with('toast_success', 'Display About Galery created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'thumbnail_img' => 'nullable|file|image',
        ], [
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
        ]);

        $article = DisplayAboutGalery::findOrFail($id);

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

        return redirect()->back()->with('toast_success', 'Display About Galery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayAboutGalery::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display About Galery deleted successfully');
    }
}
