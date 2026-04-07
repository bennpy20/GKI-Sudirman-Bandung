<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'address',
        'gender',
        'status',
        'phone_number',
        'birth_date',
        'join_date',
        'membership',
        'is_active',
        'is_region_leader',
        'users_id',
        'regions_id',
        'commissions_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function regions()
    {
        return $this->belongsTo(Region::class,'regions_id');
    }

    public function commissions()
    {
        return $this->belongsTo(Commission::class,'commissions_id');
    }

    public function stewards()
    {
        return $this->belongsToMany(Steward::class, 'member_services', 'members_id', 'stewards_id');
    }
}
