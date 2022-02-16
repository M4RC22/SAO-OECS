<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class narrativeImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'type',
    ];

    public function narrative()
    {
        return $this->belongsTo(Narrative::class);
    }
}
