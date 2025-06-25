<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->paginate(10);
        $cabangs = Branch::all();
        return view('pages.dashboard.service.index', compact('service', 'cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'is_active' => 'boolean',
        ], [
            'branch_id.required' => 'Cabang wajib dipilih.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'name.required' => 'Nama harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'is_active.boolean' => 'Status aktif harus berupa Aktif atau NonAktif.',
        ]);

        Service::create($validated);

        return redirect()->back()->with('toast_success', 'Service created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'is_active' => 'boolean',
        ], [
            'branch_id.required' => 'Cabang wajib dipilih.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'name.required' => 'Nama harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'price.required' => 'Harga harus diisi.',
            'is_active.boolean' => 'Status aktif harus berupa Aktif atau NonAktif.',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->back()->with('toast_success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('toast_success', 'Service deleted successfully');
    }

 
}
