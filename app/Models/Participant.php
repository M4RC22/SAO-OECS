<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'section',
        'participatedDate',
    ];

    protected $dates = [
            'participatedDate',
    ];

    public function narrative()
    {
        return $this->belongsTo(Narrative::class);
    }
}
