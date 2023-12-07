<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryPathnerPaid extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('trx_id', 'like', '%'.$search.'%')
        );
    }

    public function customerBill() :BelongsTo
    {
        return $this->belongsTo(PaymentBill::class, 'va', 'virtual_account');
    }
}
