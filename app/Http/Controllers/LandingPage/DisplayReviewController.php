<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayReview;
use Illuminate\Http\Request;

class DisplayReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayReviews = DisplayReview::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-review.index', compact('diplayReviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Judul harus diisi',
            'description.required' => 'description harus diisi',
            'role.required' => 'Role harus diisi',
        ]);

        DisplayReview::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Review created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Judul harus diisi',
            'description.required' => 'description harus diisi',
            'role.required' => 'Role harus diisi',
        ]);

        $article = DisplayReview::findOrFail($id);

        $article->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayReview::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Review deleted successfully');
    }
}
