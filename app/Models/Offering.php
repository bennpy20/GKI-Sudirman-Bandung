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

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commissions_id');
    }

    public function worship()
    {
        return $this->belongsTo(Worship::class, 'worships_id');
    }
}
