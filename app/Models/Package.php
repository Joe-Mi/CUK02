<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'tier',
        'benefits',
        'price',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function sponsorPackages()
    {
        return $this->hasMany(SponsorPackage::class);
    }
}
