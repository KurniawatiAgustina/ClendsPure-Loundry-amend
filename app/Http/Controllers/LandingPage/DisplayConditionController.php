<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayCondition;
use Illuminate\Http\Request;

class DisplayConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayConditions = DisplayCondition::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-condition.index', compact('diplayConditions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'radius' => 'required',
            'minimum' => 'required',
            'note' => 'required',
        ], [
            'radius.required' => 'Judul harus diisi',
            'minimum.required' => 'minimum harus diisi',
            'note.required' => 'Catatan harus diisi',
        ]);

        DisplayCondition::create([
            'radius' => $validated['radius'],
            'minimum' => $validated['minimum'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Condition created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'radius' => 'required',
            'minimum' => 'required',
            'note' => 'required',
        ], [
            'radius.required' => 'Judul harus diisi',
            'minimum.required' => 'minimum harus diisi',
            'note.required' => 'Catatan harus diisi',
        ]);

        $article = DisplayCondition::findOrFail($id);

        $article->update([
            'radius' => $validated['radius'],
            'minimum' => $validated['minimum'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Condition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayCondition::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Condition deleted successfully');
    }
}
