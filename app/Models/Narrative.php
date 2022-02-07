<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narrative extends Model
{
    use HasFactory;

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function commentSuggestion()
    {
        return $this->hasMany(CommentSuggestion::class);
    }

    public function narrativeImage()
    {
        return $this->hasMany(NarrativeImage::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }
}
