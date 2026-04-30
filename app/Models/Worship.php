<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worship extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
        'description',
        'bible_verse',
        'video_url',
        'category',
        'date',
        'time',
        'liturgical_calendars_id',
        'preachers_id',
    ];

    // public function sunday_services()
    // {
    //     return $this->hasMany(SundayService::class,'worships_id');
    // }

    public function liturgical_calendars()
    {
        return $this->belongsTo(LiturgicalCalendar::class,'liturgical_calendars_id');
    }

    public function preachers()
    {
        return $this->belongsTo(Preacher::class,'preachers_id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class,'sunday_services','worships_id','members_id');
    }

    public function stewards()
    {
        return $this->belongsToMany(Steward::class,'sunday_services','worships_id','stewards_id');
    }

    public function sunday_services()
    {
        return $this->hasMany(SundayService::class,'worships_id');
    }
}
