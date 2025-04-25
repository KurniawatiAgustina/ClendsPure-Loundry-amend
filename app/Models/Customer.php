<?php

namespace App\Models;

use App\Models\Scopes\CustomerByRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope(new CustomerByRoleScope);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
