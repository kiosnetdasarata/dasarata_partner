<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentBill extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'customer_id',
        'virtual_account',
        'nama_paket',
        'amount',
    ];

    public function customer() :BelongsTo
    {
        return $this->belongsTo(PartnerCustomer::class, 'customer_id', 'partner_customer_id');
    }

    public function histories() :HasMany
    {
        return $this->hasMany(HistoryPathnerPaid::class, 'va', 'virtual_account');
    }
}
