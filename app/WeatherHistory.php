<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherHistory extends Model
{
    public $fillable = [
        'city',
        'day',
        'data'
    ];

    public $casts = [
        'day' => 'date',
        'data' => 'array',
    ];
}
