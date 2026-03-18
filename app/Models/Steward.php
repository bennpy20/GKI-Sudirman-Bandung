<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Steward extends Model
{
    protected $fillable = ['field'];

    public function members()
    {
        return $this->belongsToMany(Member::class,'members_has_stewards','stewards_id','members_id');
    }
}
