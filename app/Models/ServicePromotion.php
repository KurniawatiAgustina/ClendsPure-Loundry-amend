<?php

namespace App\Models;

use App\Models\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePromotion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope(new RoleScope);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
