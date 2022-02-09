<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'startDate',
        'endDate'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
}

//HEllo World
