<?php

namespace App\Models;

use App\Models\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope(new RoleScope);
    }
}
