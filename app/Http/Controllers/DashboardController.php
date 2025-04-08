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
        if ($request->start_date && $request->end_date) {
            $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->startOfDay()->toDateTimeString();
            $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->endOfDay()->toDateTimeString();

            $chartData = Order::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as full_date, SUM(total_price) as total_income')
            ->groupBy('full_date')
            ->orderBy('full_date', 'asc');

        $topServices = Service::select(
                'services.id',
                'services.name',
                DB::raw('SUM(order_details.quantity) as total_ordered')
            )
            ->join('order_details', 'services.id', '=', 'order_details.service_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->groupBy('services.id', 'services.name')
            ->orderByDesc('total_ordered')
            ->limit(5);

            $userCount = User::count();
            $branchCount = Branch::count();
            $customerCount = Customer::count();
            $sumIncome = Order::sum('total_price');
            $sumIncomeThisMonth = Order::whereMonth('created_at', date('m'))->sum('total_price');
            $transactionCount = Order::count();

            $data = (object)[
                'userCount' => $userCount,
                'branchCount' => $branchCount,
                'customerCount' => $customerCount,
                'sumIncome' => $sumIncome,
                'sumIncomeThisMonth' => $sumIncomeThisMonth,
                'transactionCount' => $transactionCount,
                'chartDataKey' => $chartData->pluck('full_date'),
                'chartDataValue' => $chartData->pluck('total_income'),
                'topServicesKey' => $topServices->pluck('name'),
                'topServicesValue' => $topServices->pluck('total_ordered'),
                'startDate' => Carbon::parse($startDate)->locale('id_ID')->translatedFormat('j F Y'),
                'endDate' => Carbon::parse($endDate)->locale('id_ID')->translatedFormat('j F Y'),
                'startDateUnformatted' => $request->start_date,
                'endDateUnformatted' => $request->end_date,

            ];

        } else {
            $chartData = Order::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->selectRaw('DATE(created_at) as full_date, SUM(total_price) as total_income')
            ->groupBy('full_date')
            ->orderBy('full_date', 'asc');

        $topServices = Service::select(
                'services.id',
                'services.name',
                DB::raw('SUM(order_details.quantity) as total_ordered')
            )
            ->join('order_details', 'services.id', '=', 'order_details.service_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', date('m'))
            ->whereYear('orders.created_at', date('Y'))
            ->groupBy('services.id', 'services.name')
            ->orderByDesc('total_ordered')
            ->limit(5);

            $userCount = User::count();
            $branchCount = Branch::count();
            $customerCount = Customer::count();
            $sumIncome = Order::sum('total_price');
            $sumIncomeThisMonth = Order::whereMonth('created_at', date('m'))->sum('total_price');
            $transactionCount = Order::count();

            $data = (object)[
                'userCount' => $userCount,
                'branchCount' => $branchCount,
                'customerCount' => $customerCount,
                'sumIncome' => $sumIncome,
                'sumIncomeThisMonth' => $sumIncomeThisMonth,
                'transactionCount' => $transactionCount,
                'chartDataKey' => $chartData->pluck('full_date'),
                'chartDataValue' => $chartData->pluck('total_income'),
                'topServicesKey' => $topServices->pluck('name'),
                'topServicesValue' => $topServices->pluck('total_ordered'),
                'startDate' => null,
                'endDate' => null,
            ];
        }
        return view('pages.dashboard.general.dashboard', compact('data'));
    }
}
