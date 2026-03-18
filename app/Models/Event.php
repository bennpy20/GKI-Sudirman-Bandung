<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'description'
    ];

    public function budgets()
    {
        return $this->hasMany(EventBudget::class, 'events_id');
    }
}
