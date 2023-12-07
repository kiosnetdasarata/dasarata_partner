<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PartnerCustomer extends Model
{
    use HasFactory;

    // protected $connection = 'mysql';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'partner_id',
        'partner_customer_id',
        'customer_id',
        'nik',
        'nama',
        'alamat',
        'nomor_telpn',
        'area_cover',
        'tanggal_daftar',
        'status_customer',
        'date_isolir'
    ];

    public function partner() :BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function paymentBill() :HasOne
    {
        return $this->hasOne(PaymentBill::class, 'customer_id', 'partner_customer_id');
    }
}
