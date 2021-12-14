<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class UserImageSeen extends Model
{
    protected $table = 'users_images_seen';

    protected $fillable = [
        "id",
        "image_id",
        "user_id",
        "seen",
    ];

    public $timestamps = false;
}
