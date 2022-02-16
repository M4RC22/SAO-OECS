<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Narrative extends Model
{
    use HasFactory;

    protected $fillable = [
        'narration',
        'evalrating',
        'eventDate',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($narrative){

            $request = request();  

            foreach($request->poster as $poster){

                $imagePath = $poster->store('uploads/posters', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->resize(600,400);
                $image->save();

                $narrative->narrativeImage()->create([
                        'image' => $imagePath,
                        'type' => 'poster',
                ]);
            }

            foreach($request->photos as $photo){

                $imagePath = $photo->store('uploads/photos', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))->resize(600,400);
                $image->save();

                $narrative->narrativeImage()->create([
                        'image' => $imagePath,
                        'type' => 'photo',
                ]);
            }

            for($i = 0; $i < count($request->firstName); $i++){

                $narrative->participant()->create([
                    'firstName' => $request->firstName[$i],
                    'lastName' => $request->lastName[$i],
                    'section' => $request->section[$i],
                    'participatedDate' => $request->participatedDate[$i],
                ]);
            }

            for($i = 0; $i < count($request->actTitle); $i++){

                $narrative->program()->create([
                    'activity' => $request->actTitle[$i],
                    'startDate' => $request->startDate[$i],
                    'endDate' => $request->endDate[$i],
                ]);
            }

            for($i = 0; $i < count($request->comments); $i++){

                $narrative->commentSuggestion()->create([
                    'message' => $request->comments[$i],
                    'type' => 'comment',
                ]);
            }

            for($i = 0; $i < count($request->suggestions); $i++){

                $narrative->commentSuggestion()->create([
                    'message' => $request->suggestions[$i],
                    'type' => 'suggestion',
                ]);
            }
            
        });
    }

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
