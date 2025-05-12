<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DisplayTimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayTimelines = DisplayTimeline::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-timeline.index', compact('diplayTimelines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'thumbnail_img' => 'required|file|image|mimes:jpeg,jpg,png',
        ], [
            'title.required' => 'Judul harus diisi',
            'thumbnail_img.required' => 'Gambar harus diisi',
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
            'thumbnail_img.mimes' => 'Thumbnail harus berupa file dengan tipe: jpeg, jpg, png',
        ]);

        if ($request->hasFile('thumbnail_img')) {
            $file = $request->file('thumbnail_img');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('display-timlines'), $fileName);
            $validated['thumbnail_img'] = $fileName;
        }

        DisplayTimeline::create($validated);

        return redirect()->back()->with('toast_success', 'Display Timeline created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'thumbnail_img' => 'nullable|file|image',
        ], [
            'title.required' => 'Judul harus diisi',
            'thumbnail_img.file' => 'Thumbnail harus berupa file',
            'thumbnail_img.image' => 'Thumbnail harus berupa gambar',
        ]);

        $article = DisplayTimeline::findOrFail($id);

        if ($request->hasFile('thumbnail_img')) {
            if ($article->thumbnail_img && file_exists(public_path('display-timlines/' . $article->thumbnail_img))) {
                unlink(public_path('display-timlines/' . $article->thumbnail_img));
            }

            $file = $request->file('thumbnail_img');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('display-timlines'), $fileName);
            $validated['thumbnail_img'] = $fileName;
        }

        $article->update($validated);

        return redirect()->back()->with('toast_success', 'Display Timeline updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayTimeline::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Timeline deleted successfully');
    }
}
