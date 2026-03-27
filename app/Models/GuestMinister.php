<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestMinister extends Model
{
    protected $fillable = [
        'name',
        'role',
    ];

    public function worships()
    {
        return $this->hasMany(Worship::class,'guest_ministers_id');
    }
}
