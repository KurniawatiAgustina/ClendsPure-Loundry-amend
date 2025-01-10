<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServicePromotion;

class ServicePromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        $service_promotion = ServicePromotion::all();
        $cabangs = Branch::all();
        return view('pages.dashboard.service-promotion.index', compact('service_promotion', 'services', 'cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'service_id' => 'required|exists:services,id',
            'discount_percentage' => 'required|min:0|max:100',
            'min_quantity' => 'required|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'name.required' => 'Nama harus diisi.',
            'service_id.required' => 'ID layanan harus diisi.',
            'service_id.exists' => 'ID layanan tidak ditemukan.',
            'discount_percentage.required' => 'Persentase diskon harus diisi.',
            'discount_percentage.min' => 'Persentase diskon tidak boleh kurang dari 0.',
            'discount_percentage.max' => 'Persentase diskon tidak boleh lebih dari 100.',
            'min_quantity.required' => 'Jumlah minimum harus diisi.',
            'min_quantity.min' => 'Jumlah minimum tidak boleh kurang dari 1.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'end_date.required' => 'Tanggal berakhir harus diisi.',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal yang valid.',
            'end_date.after' => 'Tanggal berakhir harus setelah tanggal mulai.',
        ]);

        ServicePromotion::create($validated);

        return redirect()->back()->with('toast_success', 'Service promotion created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required',
            'service_id' => 'required|exists:services,id',
            'discount_percentage' => 'required|min:0|max:100',
            'min_quantity' => 'required|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'branch_id.required' => 'Cabang wajib dipilih.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'name.required' => 'Nama harus diisi.',
            'service_id.required' => 'ID layanan harus diisi.',
            'service_id.exists' => 'ID layanan tidak ditemukan.',
            'discount_percentage.required' => 'Persentase diskon harus diisi.',
            'discount_percentage.min' => 'Persentase diskon tidak boleh kurang dari 0.',
            'discount_percentage.max' => 'Persentase diskon tidak boleh lebih dari 100.',
            'min_quantity.required' => 'Jumlah minimum harus diisi.',
            'min_quantity.min' => 'Jumlah minimum tidak boleh kurang dari 1.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'end_date.required' => 'Tanggal berakhir harus diisi.',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal yang valid.',
            'end_date.after' => 'Tanggal berakhir harus setelah tanggal mulai.',
        ]);

        $promotion = ServicePromotion::findOrFail($id);
        $promotion->update($validated);

        return redirect()->back()->with('toast_success', 'Service promotion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = ServicePromotion::findOrFail($id);
        $promotion->delete();

        return redirect()->back()->with('toast_success', 'Service promotion deleted successfully');
    }
}
