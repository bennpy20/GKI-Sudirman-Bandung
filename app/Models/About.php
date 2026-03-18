<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'name',
        'description',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
