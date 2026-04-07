<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberService extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'members_id',
        'stewards_id'
    ];

    public function members()
    {
        return $this->belongsTo(Member::class,'members_id');
    }

    public function stewards()
    {
        return $this->belongsTo(Steward::class,'stewards_id');
    }
}
