<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partner extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'partner_id',
        'nama_perusahaan',
        'penanggung_jawab',
        'alamat',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
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

    public function user() :HasOne
    {
        return $this->hasOne(User::class, 'partner_id', 'partner_id');
    }
}
