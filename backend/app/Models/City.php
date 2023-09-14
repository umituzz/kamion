<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * CLass City
 * @package App\Models
 */
class City extends BaseModel
{
    protected $fillable = [
        'country_id',
        'name',
        'plate'
    ];

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
