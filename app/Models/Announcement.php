<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'category',
        'title',
        'content',
        'image_url',
        'date_start',
        'date_end',
        'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
