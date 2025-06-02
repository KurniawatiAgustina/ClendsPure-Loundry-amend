<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayStatistic;
use Illuminate\Http\Request;

class DisplayStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayStatistics = DisplayStatistic::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-statistic.index', compact('diplayStatistics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'number' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'number.required' => 'number harus diisi',
        ]);

        DisplayStatistic::create([
            'title' => $validated['title'],
            'number' => $validated['number'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Statistic created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'number' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'number.required' => 'number harus diisi',
        ]);

        $article = DisplayStatistic::findOrFail($id);

        $article->update([
            'title' => $validated['title'],
            'number' => $validated['number'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Statistic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayStatistic::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Statistic deleted successfully');
    }
}
