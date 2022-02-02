<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
    use HasFactory;
    
    public function proposalForms()
    {
        return $this->belongsTo(Forms::class);
    }

    public function proposalActivities()
    {
        return $this->hasMany(Activities::class);
    }
}
