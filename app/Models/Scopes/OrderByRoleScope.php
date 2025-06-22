<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class OrderByRoleScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user();

        if ($user && $user->role == 'Admin' || $user->role == 'Cashier') {
            $builder->where('branch_id', $user->branch_id);
        }

        if ($user && $user->role == 'Customer') {
            $builder->whereHas('customer', function (Builder $query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }
    }
}
