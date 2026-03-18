<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBudget extends Model
{
    protected $fillable = [
        'amount',
        'division',
        'events_id',
        'commissions_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'events_id');
    }

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commissions_id');
    }
}
