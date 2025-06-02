<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayTutorial;
use Illuminate\Http\Request;

class DisplayTutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayTutorials = DisplayTutorial::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-tutorial.index', compact('diplayTutorials'));
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

        DisplayTutorial::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Tutorial created successfully');
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

        $article = DisplayTutorial::findOrFail($id);

        $article->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Tutorial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayTutorial::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Tutorial deleted successfully');
    }
}
