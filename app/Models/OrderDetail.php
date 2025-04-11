<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function service_promotion()
    {
        return $this->belongsTo(ServicePromotion::class);
    }
}
