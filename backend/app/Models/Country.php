<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * CLass Country
 * @package App\Models
 */
class Country extends BaseModel
{
    protected $fillable = [
        'name',
        'code'
    ];

    /**
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
