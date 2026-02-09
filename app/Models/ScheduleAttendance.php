<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'schedule_id',
        'attended',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function eventSchedule()
    {
        return $this->belongsTo(EventSchedule::class, 'schedule_id');
    }
}
