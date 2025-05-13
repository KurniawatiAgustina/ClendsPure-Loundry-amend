<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\OnlineOrder;
use App\Models\OnlineOrderDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\ServicePromotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = OnlineOrder::with(['customer','details' => ['service', 'service_promotion']])->whereNot('status', 'New')->orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.online-order.index', compact('order'));
    }

    public function new()
    {
        $order = OnlineOrder::with(['customer' ,'details' => ['service', 'service_promotion']])->where('status', 'New')->orderBy('id', 'desc')->paginate(10);
        return view('pages.dashboard.new-online-order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = Carbon::now()->toDateTimeString();

        $services = Service::where('is_active', 1)
            ->select('id','name','price')
            ->get()
            ->map(function($s) {
                return (object)[
                    'id'       => $s->id,
                    'name'     => $s->name,
                    'price'    => $s->price,
                    'is_promo' => 0,
                ];
            });

        $promos = ServicePromotion::with('service')
            ->where('start_date', '<=', $now)
            ->where('end_date',   '>=', $now)
            ->get()
            ->map(function($p) {
                $orig = $p->service;
                $discounted = intval($orig->price * (100 - $p->discount_percentage) / 100);

                return (object)[
                    'id'           => $p->id,
                    'name'         => $orig->name . ' (Promo: ' . $p->name . ')',
                    'price'        => $discounted,
                    'is_promo'     => 1,
                ];
            });

        $items = $services->merge($promos);
        $paymentMethodsAvailable = PaymentMethod::all();
        $branches = Branch::all();

        return view('pages.dashboard.online-order.create', compact('items', 'paymentMethodsAvailable', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'branch_id' => 'required|exists:branches,id',
            'total_price' => 'required',
            'category' => 'required|in:AntarJemput,AntarSaja,JemputSaja,Mandiri',
            'payment_method' => 'required|in:Cash,Transfer',
            'payment_method_id' => 'nullable',
            'details' => 'required|array',
            'details.*.service_id' => 'nullable|exists:services,id',
            'details.*.service_promotions_id' => 'nullable|exists:service_promotions,id',
            'details.*.is_promo' => 'required|boolean',
            'details.*.quantity' => 'required|min:1',
            'details.*.subtotal' => 'required',
        ], [
            'customer_name.required' => 'Nama pelanggan harus diisi.',
            'customer_phone.required' => 'Nomor telepon pelanggan harus diisi.',
            'customer_address.required' => 'Alamat pelanggan harus diisi.',
            'branch_id.required' => 'Cabang harus diisi.',
            'branch_id.exists' => 'Cabang tidak ditemukan.',
            'total_price.required' => 'Total harga harus diisi.',
            'category.required' => 'Kategori harus diisi.',
            'category.in' => 'Kategori harus berupa AntarJemput, AntarSaja, JemputSaja, atau Mandiri.',
            'payment_method.required' => 'Metode pembayaran harus diisi.',
            'payment_method.in' => 'Metode pembayaran harus berupa Cash atau Transfer.',
            'details.required' => 'Detail harus diisi.',
            'details.*.service_id.required' => 'ID layanan harus diisi.',
            'details.*.service_id.exists' => 'ID layanan tidak ditemukan.',
            'details.*.service_promotions_id.exists' => 'ID promo tidak ditemukan.',
            'details.*.is_promo.required' => 'Promo harus diisi.',
            'details.*.quantity.required' => 'Jumlah harus diisi.',
            'details.*.quantity.min' => 'Jumlah harus minimal 1.',
            'details.*.subtotal.required' => 'Subtotal harus diisi.',
        ]);
// dd($validated);
        DB::transaction(function () use ($validated) {
            $customer = Customer::create([
                'user_id' => auth()->user()->id,
                'name' => $validated['customer_name'],
                'phone' => $validated['customer_phone'],
                'address' => $validated['customer_address'],
            ]);

            $order = OnlineOrder::create([
                'customer_id' => $customer->id,
                'branch_id' => $validated['branch_id'],
                'total_price' => $validated['total_price'],
                'status' => 'New',
                'category' => $validated['category'],
                'payment_method' => $validated['payment_method'],
                'payment_method_id' => $validated['payment_method_id'],
            ]);

            foreach ($validated['details'] as $detail) {
                OnlineOrderDetail::create([
                    'order_id' => $order->id,
                    'service_id' => $detail['service_id'] ?? null,
                    'service_promotions_id' => $detail['service_promotions_id'] ?? null,
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
            'status' => 'required|in:New,Accepted,Cancelled',
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
            $order = OnlineOrder::findOrFail($id);
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
                OnlineOrderDetail::create([
                    'order_id' => $order->id,
                    'service_id' => $detail['service_id'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }
        });

        return redirect()->back()->with('toast_success', 'Order updated successfully');
    }

    public function accept(string $id) {
        DB::transaction(function () use ($id) {
            $order = OnlineOrder::findOrFail($id);
            $order->update(['status' => 'Accepted']);

            $newOrder =Order::create([
                'customer_id' => $order->customer_id,
                'branch_id' => $order->branch_id,
                'total_price' => $order->total_price,
                'status' => 'New',
                'category' => $order->category,
                'payment_method' => $order->payment_method,
                'payment_method_id' => $order->payment_method_id,
            ]);
            foreach ($order->details as $detail) {
                OrderDetail::create([
                    'order_id' => $newOrder->id,
                    'service_id' => $detail->service_id,
                    'service_promotions_id' => $detail->service_promotions_id,
                    'is_promo' => $detail->is_promo,
                    'quantity' => $detail->quantity,
                    'subtotal' => $detail->subtotal,
                ]);
            }
        });

        return redirect()->back()->with('toast_success', 'Order accepted successfully');
    }

    public function cancel(string $id) {
        DB::transaction(function () use ($id) {
            $order = OnlineOrder::findOrFail($id);
            $order->update(['status' => 'Cancelled']);
        });

        return redirect()->back()->with('toast_success', 'Order cancelled successfully');
    }

    public function changeStatus(string $id, string $status)
    {
        $order = OnlineOrder::findOrFail($id);
        $order->update(['status' => $status]);

        if ($status == 'Accepted') {
            $newOrder =Order::create([
                'customer_id' => $order->customer_id,
                'branch_id' => $order->branch_id,
                'total_price' => $order->total_price,
                'status' => 'New',
                'category' => $order->category,
                'payment_method' => $order->payment_method,
                'payment_method_id' => $order->payment_method_id,
            ]);
            foreach ($order->details as $detail) {
                OrderDetail::create([
                    'order_id' => $newOrder->id,
                    'service_id' => $detail->service_id,
                    'service_promotions_id' => $detail->service_promotions_id,
                    'is_promo' => $detail->is_promo,
                    'quantity' => $detail->quantity,
                    'subtotal' => $detail->subtotal,
                ]);
            }
        }

        return redirect()->back()->with('toast_success', 'Order status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            $order = OnlineOrder::findOrFail($id);
            $order->details()->delete();
            $order->delete();
        });

        return redirect()->back()->with('toast_success', 'Order deleted successfully');
    }
}
