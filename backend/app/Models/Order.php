<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * Class Order
 * @package App\Models
 */
class Order extends BaseModel
{
    use Searchable;

    /**
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'shippers.first_name' => '',
            'shippers.last_name' => '',
            'commodity' => '',
            'load_types.name' => '',
            'currencies.name' => '',
            'departure_cities.name' => '',
            'arrival_cities.name' => '',
            'order_statuses.name' => '',
            'orders.created_at' => '',
        ];
    }

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

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }
}
