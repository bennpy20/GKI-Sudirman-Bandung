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
        'date',
        'liturgical_calendars_id',
        'guest_ministers_id',
    ];

    public function services()
    {
        return $this->hasMany(SundayService::class,'worships_id');
    }

    public function liturgical_calendars()
    {
        return $this->belongsTo(LiturgicalCalendar::class,'liturgical_calendars_id');
    }

    public function guest_ministers()
    {
        return $this->belongsTo(GuestMinister::class,'guest_ministers_id');
    }
}
