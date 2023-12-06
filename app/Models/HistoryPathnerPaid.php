<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPathnerPaid extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('payment_reff', 'like', '%'.$search.'%')
        );
    }
}
