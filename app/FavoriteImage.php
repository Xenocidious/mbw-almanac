<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteImage extends Model
{
    public $fillable = [
        'user_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
