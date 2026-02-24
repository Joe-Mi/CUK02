<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'ticket_type_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function ticketType()
    {
        /* 
           Note: The method name is camelCase 'ticketType', 
           but the relationship usually infers 'ticket_type_id'. 
           We can specify it explicitly to be safe. 
        */
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function scheduleAttendances()
    {
        return $this->hasMany(ScheduleAttendance::class);
    }
}
