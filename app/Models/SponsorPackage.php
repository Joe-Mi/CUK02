<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id',
        'package_id',
        'purchase_date',
    ];

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
