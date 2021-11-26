<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserCity
 * @package App
 *
 * @deprecated Een pivot table hoort niet zo, laravel kan dit automatisch
 *  je hoeft alleen maar enkelvoud en alfabetisch de tabellen te doen.
 */
class UserCity extends Model
{
    protected $table = 'users_cities';

    protected $fillable = [
        "id",
        "city_id",
        "user_id",
    ];

    public $timestamps = false;
}
