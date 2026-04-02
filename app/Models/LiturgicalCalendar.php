<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiturgicalCalendar extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'color'
    ];

    public function worships()
    {
        return $this->hasMany(Worship::class,'liturgical_calendars_id');
    }
}
