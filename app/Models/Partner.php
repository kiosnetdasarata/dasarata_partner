<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'mitra_id',
        'nama_perusahaan',
        'slug',
        'penanggung_jawab',
        'alamat',
        'nomor_telpn',
        'npwp',
        'tipe_partner',
        'logo_partner',
        'tanggal_terdaftar',
        'is_active'
    ];

    public function customers() :HasMany
    {
        return $this->hasMany(PartnerCustomer::class, 'partner_id');
    }
}
