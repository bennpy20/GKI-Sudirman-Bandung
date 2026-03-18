<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'address',
        'status',
        'phone_number',
        'birth_date',
        'join_date',
        'membership',
        'is_active',
        'is_region_leader',
        'users_id',
        'regions_id',
        'commissions_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'regions_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class,'commissions_id');
    }

    public function stewards()
    {
        return $this->belongsToMany(Steward::class,'members_has_stewards','members_id','stewards_id');
    }

    public function services()
    {
        return $this->hasMany(SundayService::class,'members_id');
    }
}
