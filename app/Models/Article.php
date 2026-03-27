<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category',
        'title',
        'content',
        'image_url',
        'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
