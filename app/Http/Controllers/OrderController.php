<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\utils\Whatsapp;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with(['details' => ['service', 'service_promotion']])->paginate(10);
        return view('pages.dashboard.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.order.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required',
            'status' => 'required|in:New,Processing,Delivered,Cancelled',
            'category' => 'required|in:AntarJemput,AntarSaja,JemputSaja,Mandiri',
            'payment_method' => 'required|in:Cash,Transfer',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'details' => 'required|array',
            'details.*.service_id' => 'required|exists:services,id',
            'details.*.quantity' => 'required|min:1',
            'details.*.subtotal' => 'required',
        ], [
            'customer_id.required' => 'Pelanggan harus diisi.',
            'customer_id.exists' => 'Pelanggan tidak ditemukan.',
            'branch_id.required' => 'Cabang harus diisi.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'total_price.required' => 'Total harga harus diisi.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus berupa New, Processing, Delivered, atau Cancelled.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa AntarJemput, AntarSaja, JemputSaja, atau Mandiri.',
            'payment_method.required' => 'Metode pembayaran harus diisi.',
            'payment_method.in' => 'Metode pembayaran harus berupa Cash atau Transfer.',
            'payment_method_id.exists' => 'Metode pembayaran tidak ditemukan.',
            'details.required' => 'Detail harus diisi.',
            'details.*.service_id.required' => 'ID layanan harus diisi.',
            'details.*.service_id.exists' => 'ID layanan tidak ditemukan.',
            'details.*.quantity.required' => 'Jumlah harus diisi.',
            'details.*.quantity.min' => 'Jumlah harus minimal 1.',
            'details.*.subtotal.required' => 'Subtotal harus diisi.',
        ]);

        DB::transaction(function () use ($validated) {
            $order = Order::create([
                'customer_id' => $validated['customer_id'],
                'branch_id' => $validated['branch_id'],
                'total_price' => $validated['total_price'],
                'status' => $validated['status'],
                'category' => $validated['category'],
                'payment_method' => $validated['payment_method'],
                'payment_method_id' => $validated['payment_method_id'],
            ]);

            foreach ($validated['details'] as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'service_id' => $detail['service_id'],
                    'service_promotions_id' => $detail['service_promotions_id'],
                    'is_promo' => $detail['is_promo'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }
        });

        return redirect()->back()->with('toast_success', 'Order created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required',
            'status' => 'required|in:New,Processing,Delivered,Cancelled',
            'category' => 'required|in:AntarJemput,AntarSaja,JemputSaja,Mandiri',
            'payment_method' => 'required|in:Cash,Transfer',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'details' => 'required|array',
            'details.*.service_id' => 'required|exists:services,id',
            'details.*.quantity' => 'required|min:1',
            'details.*.subtotal' => 'required',
        ], [
            'customer_id.required' => 'Pelanggan harus diisi.',
            'customer_id.exists' => 'Pelanggan tidak ditemukan.',
            'branch_id.required' => 'Cabang harus diisi.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'total_price.required' => 'Total harga harus diisi.',
            'status.required' => 'Status harus diisi.',
            'status.in' => 'Status harus berupa New, Processing, Delivered, atau Cancelled.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa AntarJemput, AntarSaja, JemputSaja, atau Mandiri.',
            'payment_method.required' => 'Metode pembayaran harus diisi.',
            'payment_method.in' => 'Metode pembayaran harus berupa Cash atau Transfer.',
            'payment_method_id.exists' => 'Metode pembayaran tidak ditemukan.',
            'details.required' => 'Detail harus diisi.',
            'details.*.service_id.required' => 'ID layanan harus diisi.',
            'details.*.service_id.exists' => 'ID layanan tidak ditemukan.',
            'details.*.quantity.required' => 'Jumlah harus diisi.',
            'details.*.quantity.min' => 'Jumlah harus minimal 1.',
            'details.*.subtotal.required' => 'Subtotal harus diisi.',
        ]);

        DB::transaction(function () use ($validated, $id) {
            $order = Order::findOrFail($id);
            $order->update([
                'customer_id' => $validated['customer_id'],
                'branch_id' => $validated['branch_id'],
                'total_price' => $validated['total_price'],
                'status' => $validated['status'],
                'category' => $validated['category'],
                'payment_method' => $validated['payment_method'],
                'payment_method_id' => $validated['payment_method_id'],
            ]);

            $order->details()->delete();

            foreach ($validated['details'] as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'service_id' => $detail['service_id'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }
        });

        return redirect()->back()->with('toast_success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $order = Order::findOrFail($id);
            $order->details()->delete();
            $order->delete();
        });

        return redirect()->back()->with('toast_success', 'Order deleted successfully');
    }
}
