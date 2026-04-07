<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'day',
        'time_start',
        'time_end',
        'room',
    ];

    public function stewards()
    {
        return $this->hasMany(Steward::class, 'commissions_id');
    }

    public function members()
    {
        return $this->hasMany(Member::class, 'commissions_id');
    }
}
