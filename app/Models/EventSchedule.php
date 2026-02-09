<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'speaker',
        'venue',
        'date',
        'start',
        'end',
        'attendance',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scheduleAttendances()
    {
        return $this->hasMany(ScheduleAttendance::class, 'schedule_id');
    }
}
