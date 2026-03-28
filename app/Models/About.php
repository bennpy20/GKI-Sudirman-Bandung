<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'description',
        'users_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
