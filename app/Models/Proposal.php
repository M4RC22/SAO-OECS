<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer',
        'targetDate',
        'durationVal',
        'durationUnit',
        'venue',
        'actClassificationA',
        'actClassificationB',
        'description',
        'outcome',
        'rationale',
        'primaryAudience',
        'numPrimaryAudience',
    ];

    public static function boot(){

        parent::boot();

        static::created(function ($proposal){

            $request = request();

            for($i = 0; $i < count($request->programme); $i++){

                $proposal->activity()->create([
                    'activity' => $request->programme[$i],
                    'startDate' => $request->progStartDate[$i],
                    'endDate' => $request->progEndDate[$i],

                ]);
            }


            for($i = 0; $i < count($request->coorgName); $i++){
                $proposal->externalCoorganizer()->create([
                        'coorganization' => $request->coorgName[$i],
                        'coorganizer' => $request->coorganizer[$i],
                        'email' => $request->coorgEmail[$i],
                        'phoneNumber' => $request->coorgContact[$i],
                ]);
            }

            for($i = 0; $i < count($request->service); $i++){
                $proposal->logisticalNeed()->create([
                    'service' => $request->service[$i],
                    'dateNeeded' => $request->dateNeeded[$i],
                    'venue' => $request->serviceVenue[$i],
                ]);
            }
        });
    }

    
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

    public function requisition()
    {
        return $this->hasMany(Requisition::class);
    }
}
