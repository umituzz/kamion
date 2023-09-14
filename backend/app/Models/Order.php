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

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return BelongsTo
     */
    public function loadType(): BelongsTo
    {
        return $this->belongsTo(LoadType::class);
    }

    /**
     * @return BelongsTo
     */
    public function departureCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'departure_city_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function arrivalCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'arrival_city_id', 'id');
    }
}
