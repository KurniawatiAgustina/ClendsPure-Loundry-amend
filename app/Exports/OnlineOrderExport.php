<?php

namespace App\Exports;

use App\Models\OnlineOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OnlineOrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return OnlineOrder::withoutGlobalScopes()
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
