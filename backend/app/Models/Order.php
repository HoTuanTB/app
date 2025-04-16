<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';

    protected $fillable = [
        'id',
        'name',
        'order_number',
        'app_id',
        'checkout_id',
        'confirmation_number',
        'order_status_url',
    ];
}
