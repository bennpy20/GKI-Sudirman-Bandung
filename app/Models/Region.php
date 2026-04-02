<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function members()
    {
        return $this->hasMany(Member::class,'regions_id');
    }
}
