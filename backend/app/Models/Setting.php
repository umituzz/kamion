<?php

namespace App\Models;

/**
 * Class Setting
 * @package App\Models
 */
class Setting extends BaseModel
{
    protected $fillable = ['group', 'key', 'value'];
}
