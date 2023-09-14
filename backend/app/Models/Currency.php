<?php

namespace App\Models;

/**
 * CLass Currency
 * @package App\Models
 */
class Currency extends BaseModel
{
    protected $fillable = [
        'name',
        'code'
    ];
}
