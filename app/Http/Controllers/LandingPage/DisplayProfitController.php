<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayProfit;
use Illuminate\Http\Request;

class DisplayProfitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayProfits = DisplayProfit::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-profit.index', compact('diplayProfits'));
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

        DisplayProfit::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Profit created successfully');
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

        $article = DisplayProfit::findOrFail($id);

        $article->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Profit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayProfit::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Profit deleted successfully');
    }
}
