<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected string $role;
    public function __construct(string $role)
    {
        $this->role = $role;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role', $this->role)->get();
    }

    public function Headings(): array
    {
        return [
            'ID',
        ];
    }
}
