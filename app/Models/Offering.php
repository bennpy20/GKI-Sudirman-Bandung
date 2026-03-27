<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'users_id',
        'commissions_id',
        'worships_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function commissions()
    {
        return $this->belongsTo(Commission::class, 'commissions_id');
    }

    public function worships()
    {
        return $this->belongsTo(Worship::class, 'worships_id');
    }
}
