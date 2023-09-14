<?php

namespace App\Models;

/**
 * Class Order
 * @package App\Models
 */
class Order extends BaseModel
{
    protected $fillable = [
        'user_id',
        'load_type',
        'commodity',
        'departure_city',
        'arrival_city',
    ];
}
