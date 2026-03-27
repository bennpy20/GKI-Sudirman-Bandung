<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devotion extends Model
{
    protected $fillable = [
        'title',
        'content',
        'bible_verse',
        'author',
        'category',
        'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
