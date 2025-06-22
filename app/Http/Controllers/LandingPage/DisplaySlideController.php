<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplaySlide;
use Illuminate\Http\Request;

class DisplaySlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplaySlides = DisplaySlide::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-slide.index', compact('diplaySlides'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'description harus diisi',
        ]);

        DisplaySlide::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Slide created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'description.required' => 'description harus diisi',
        ]);

        $article = DisplaySlide::findOrFail($id);

        $article->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplaySlide::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Slide deleted successfully');
    }
}
