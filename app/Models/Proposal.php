<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proposal extends Model
{
    use HasFactory;

    
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function logisticalNeed()
    {
        return $this->hasMany(logisticalNeed::class);
    }
    public function externalCoorganizer()
    {
        return $this->belongsToMany(ExternalCoorganizer::class);
    }
}