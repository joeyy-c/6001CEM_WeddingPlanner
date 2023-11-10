<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_enable',
        'service_name',
        'service_desc',
        'service_guest_count',
        'service_price',
        'vendor_id'
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
