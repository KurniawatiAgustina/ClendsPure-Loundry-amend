<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\DisplayService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'image' => 'required|image',
            'title' => 'required',
            'harga' => 'required',
        ], [
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'title.required' => 'Judul harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('display-service'), $fileName);
            $validated['image'] = $fileName;
        }

        DisplayService::create([
            'image' => $validated['image'],
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
            'image' => 'nullable|image',
            'title' => 'required',
            'harga' => 'required',
        ], [
            'image.image' => 'File harus berupa gambar',
            'title.required' => 'Judul harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('display-service'), $fileName);
            $validated['image'] = $fileName;
        } else {
            $validated['image'] = null;
        }

        $article = DisplayService::findOrFail($id);

        $article->update([
            'image' => $validated['image'] ?? $article->image,
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
