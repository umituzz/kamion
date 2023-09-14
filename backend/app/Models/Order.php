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
        'load_type',
        'commodity',
        'departure_city',
        'arrival_city',
    ];

    /**
     * @return BelongsTo
     */
    public function shipper(): BelongsTo
    {
        return $this->belongsTo(Shipper::class);
    }
}
