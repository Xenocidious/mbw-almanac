<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Comment extends Model
{

    protected $table = 'images_comments';
    protected $fillable = ["image_id", "user_name", "created_at", "updated_at", "comment", "user_id"];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

}
