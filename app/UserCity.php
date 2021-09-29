<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
