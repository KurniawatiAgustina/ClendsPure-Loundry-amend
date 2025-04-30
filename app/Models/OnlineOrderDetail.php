<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineOrderDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(OnlineOrder::class);
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
