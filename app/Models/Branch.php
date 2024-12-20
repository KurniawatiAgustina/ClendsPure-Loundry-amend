<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function servicePromotions()
    {
        return $this->hasMany(ServicePromotion::class);
    }
}
