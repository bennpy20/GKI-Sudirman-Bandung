<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    protected $fillable = [
        'title',
        'bible_verse',
        'video_url',
        'session',
        'date'
    ];

    public function services()
    {
        return $this->hasMany(SundayService::class,'worships_id');
    }
}
