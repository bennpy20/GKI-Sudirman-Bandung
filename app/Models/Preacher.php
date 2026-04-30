<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preacher extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'base',
    ];

    public function worships()
    {
        return $this->hasMany(Worship::class,'preachers_id');
    }
}
