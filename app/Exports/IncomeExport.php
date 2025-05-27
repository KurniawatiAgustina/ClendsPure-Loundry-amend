<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IncomeExport implements FromCollection, WithHeadings
{
    // protected string $startDate;
    // protected string $endDate;

    // public function __construct($startDate, $endDate)
    // {
    //     $this->startDate = $startDate;
    //     $this->endDate = $endDate;
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::withoutGlobalScopes()
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('branches', 'orders.branch_id', '=', 'branches.id')
            ->orderBy('orders.created_at', 'desc')
            ->get([
                'orders.created_at',
                'customers.name as customer_name',
                'branches.name   as branch_name',
                'orders.payment_method',
                'orders.total_price',
            ]);
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Customer',
            'Cabang',
            'Metode Pembayaran',
            'Total Harga',
        ];
    }
}
