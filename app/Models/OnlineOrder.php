<?php

namespace App\Models;

use App\Models\Scopes\OrderByRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope(new OrderByRoleScope);
    }

    public function details()
    {
        return $this->hasMany(OnlineOrderDetail::class, 'order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
