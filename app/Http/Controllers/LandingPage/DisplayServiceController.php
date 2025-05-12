<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayService;
use Illuminate\Http\Request;

class DisplayServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplayServices = DisplayService::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.display-service.index', compact('diplayServices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'harga' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);

        DisplayService::create([
            'title' => $validated['title'],
            'Harga' => $validated['harga'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Service created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'harga' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);

        $article = DisplayService::findOrFail($id);

        $article->update([
            'title' => $validated['title'],
            'Harga' => $validated['harga'],
        ]);

        return redirect()->back()->with('toast_success', 'Display Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = DisplayService::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('toast_success', 'Display Service deleted successfully');
    }
}
