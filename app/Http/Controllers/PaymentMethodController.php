<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_method = PaymentMethod::orderBy('id', 'desc')->paginate(10);
        $cabangs = Branch::all();
        return view('pages.dashboard.payment-method.index', compact('payment_method', 'cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'bank_name' => 'required|max:255',
            'account_name' => 'required|max:255',
            'account_number' => 'required',
            'bank_type' => 'required|in:Bank,E-Wallet',
        ], [
            'branch_id.required' => 'Cabang wajib dipilih.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'bank_name.required' => 'Nama bank wajib diisi.',
            'bank_name.max' => 'Nama bank tidak boleh lebih dari 255 karakter.',
            'account_name.required' => 'Nama akun wajib diisi.',
            'account_name.max' => 'Nama akun tidak boleh lebih dari 255 karakter.',
            'account_number.required' => 'Nomor rekening wajib diisi.',
            'bank_type.required' => 'Tipe bank wajib dipilih.',
            'bank_type.in' => 'Tipe bank harus berupa Bank atau E-Wallet.',
        ]);

        PaymentMethod::create($validated);

        return redirect()->back()->with('toast_success', 'Payment method created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'bank_name' => 'required|max:255',
            'account_name' => 'required|max:255',
            'account_number' => 'required',
            'bank_type' => 'required|in:Bank,E-Wallet',
        ], [
            'bank_name.required' => 'Nama bank wajib diisi.',
            'bank_name.max' => 'Nama bank tidak boleh lebih dari 255 karakter.',
            'account_name.required' => 'Nama akun wajib diisi.',
            'account_name.max' => 'Nama akun tidak boleh lebih dari 255 karakter.',
            'account_number.required' => 'Nomor rekening wajib diisi.',
            'bank_type.required' => 'Tipe bank wajib dipilih.',
            'bank_type.in' => 'Tipe bank harus berupa Bank atau E-Wallet.',
        ]);

        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($validated);

        return redirect()->back()->with('toast_success', 'Payment method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()->back()->with('toast_success', 'Payment method deleted successfully');
    }
}
