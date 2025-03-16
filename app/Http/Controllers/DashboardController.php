<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request)
    {
        $userCount = User::count();
        $branchCount = Branch::count();
        $customerCount = Customer::count();
        $sumIncome = Order::sum('total_price');
        $transactionCount = Order::count();

        $rows = Order::whereMonth('created_at', date('m') - 1)
            ->whereYear('created_at', date('Y'))
            ->selectRaw('DATE(created_at) as full_date, SUM(total_price) as total_income')
            ->groupBy('full_date')
            ->orderBy('full_date', 'asc')
            ->get();

        $chartData = $rows->map(function($row) {
            return [
                'date'         => Carbon::parse($row->full_date)->format('j'),
                'total_income' => $row->total_income,
            ];
        });
        $topServices = Service::select(
                'services.id',
                'services.name',
                DB::raw('SUM(order_details.quantity) as total_ordered')
            )
            ->join('order_details', 'services.id', '=', 'order_details.service_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', date('m') - 1)
            ->groupBy('services.id', 'services.name')
            ->orderByDesc('total_ordered')
            ->limit(5)
            ->get();

        // dd([
        //     'userCount' => $userCount,
        //     'branchCount' => $branchCount,
        //     'customerCount' => $customerCount,
        //     'sumIncome' => $sumIncome,
        //     'transactionCount' => $transactionCount,
        //     'chartData' => $chartData,
        //     'topServices' => $topServices,
        // ]);
        return view('pages.dashboard.general.dashboard');
    }
}
