<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SundayService extends Model
{
    protected $fillable = [
        'guest_name',
        'role',
        'members_id',
        'worships_id'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class,'members_id');
    }

    public function worship()
    {
        return $this->belongsTo(Worship::class,'worships_id');
    }
}
