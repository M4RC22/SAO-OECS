<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'startDate',
        'endDate',
    ];

    protected $dates = [
        'startDate',
        'endDate',
    ];
        
    public function narrative()
    {
        return $this->belongsTo(Narrative::class);
    }
}
