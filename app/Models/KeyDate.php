<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'type',
        'start_date',
        'end_date',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
