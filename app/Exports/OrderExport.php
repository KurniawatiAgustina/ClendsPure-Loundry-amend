<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
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
                'orders.id',
                'customers.name as customer_name',
                'branches.name   as branch_name',
                'orders.category',
                'orders.payment_method',
                'orders.total_price',
                'orders.status',
            ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Customer',
            'Cabang',
            'Kategori',
            'Metode Pembayaran',
            'Total Harga',
            'Status',
        ];
    }
}
