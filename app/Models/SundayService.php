<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SundayService extends Model
{
    protected $fillable = [
        'members_id',
        'worships_id'
    ];

    public function members()
    {
        return $this->belongsTo(Member::class,'members_id');
    }

    public function worships()
    {
        return $this->belongsTo(Worship::class,'worships_id');
    }
}
