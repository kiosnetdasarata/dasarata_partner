<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaCustomer extends Model
{
    use HasFactory;

    protected $connection = 'customer';

    public $timestamps = false;
    protected $fillable = [
        'va',
        'customer_personal_id',
        'aplikasi'
    ];
}
