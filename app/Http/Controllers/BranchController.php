<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branch::orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.branch.index', compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'phone.required' => 'No Telepon harus diisi',
        ]);

        $branch = Branch::create($validated);

        return redirect()->back()->with('toast_success', 'Branch created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'address.required' => 'Alamat harus diisi',
            'ohone.required' => 'No Telepon harus diisi',
        ]);

        $branch = Branch::findOrFail($id);
        $branch->update($validated);

        return redirect()->back()->with('toast_success', 'Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->back()->with('toast_success', 'Branch deleted successfully');
    }
}
