<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Steward extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'field',
        'commissions_id'
        ];

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commissions_id');
    }

    public function members()
    {
        return $this->belongsToMany(Member::class,'member_services','stewards_id','members_id');
    }

    public function worships()
    {
        return $this->belongsToMany(Worship::class,'sunday_services','stewards_id','worships_id');
    }
}
