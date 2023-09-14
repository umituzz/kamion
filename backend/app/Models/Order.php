<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Order
 * @package App\Models
 */
class Order extends BaseModel
{
    protected $fillable = [
        'shipper_id',
        'load_type_id',
        'currency_id',
        'commodity',
        'departure_city_id',
        'arrival_city_id',
    ];

    /**
     * @return BelongsTo
     */
    public function shipper(): BelongsTo
    {
        return $this->belongsTo(Shipper::class);
    }
}
