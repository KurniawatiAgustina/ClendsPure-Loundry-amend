<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customer = Customer::orderBy('id', 'desc')->when($request->search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('pages.dashboard.customer.index', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|max:15',
            // 'city_id' => 'required|exists:cities,id',
            // 'subdistrict_id' => 'required|exists:subdistricts,id',
            // 'village_id' => 'required|exists:villages,id',
            'address' => 'required',
        ], [
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            // 'city_id.required' => 'Kota wajib dipilih.',
            // 'city_id.exists' => 'Kota tidak ditemukan.',
            // 'subdistrict_id.required' => 'Kecamatan wajib dipilih.',
            // 'subdistrict_id.exists' => 'Kecamatan tidak ditemukan.',
            // 'village_id.required' => 'Desa wajib dipilih.',
            // 'village_id.exists' => 'Desa tidak ditemukan.',
            'address.required' => 'Alamat wajib diisi.',
        ]);

        $customer = Customer::create($validated);

        return redirect()->back()->with('toast_success', 'Customer created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required|max:15',
            // 'city_id' => 'required|exists:cities,id',
            // 'subdistrict_id' => 'required|exists:subdistricts,id',
            // 'village_id' => 'required|exists:villages,id',
            'address' => 'required',
        ], [
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            // 'city_id.required' => 'Kota wajib dipilih.',
            // 'city_id.exists' => 'Kota tidak ditemukan.',
            // 'subdistrict_id.required' => 'Kecamatan wajib dipilih.',
            // 'subdistrict_id.exists' => 'Kecamatan tidak ditemukan.',
            // 'village_id.required' => 'Desa wajib dipilih.',
            // 'village_id.exists' => 'Desa tidak ditemukan.',
            'address.required' => 'Alamat wajib diisi.',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validated);

        return redirect()->back()->with('toast_success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('toast_success', 'Customer deleted successfully');
    }
}
