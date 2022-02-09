<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'createdBy',
        'formType',
        'orgName',
        'controlNumber',
        'eventTitle',
        'currApprover',
        'status',
        'adviserIsApprove',
        'saoIsApprove',
        'acadServIsApprove',
        'financeIsApprove',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($form){

            $request = request();

        
            $form->proposal()->create([
                'organizer' => 1,
                'targetDate' => $request->eventDate,
                'durationVal' => $request->durationVal,
                'durationUnit' => $request->durationUnit,
                'venue' => $request->venue,
                'actClassificationA' => $request->actClassificationA,
                'actClassificationB' => $request->actClassificationB,
                'description' => $request->description,
                'outcome' => $request->outcome,
                'rationale' => $request->rationale,
                'primaryAudience' => $request->primaryAud,
                'numPrimaryAudience' => $request->primaryNum,
                'primaryAudience' => $request->secondaryAud,
                'numPrimaryAudience' => $request->secondaryNum,

            ]);
        });

    }

    public function proposal()
    {
        return $this->hasOne(Proposal::class);
    }
    public function liquidation(){
        return $this->hasOne(Liquidation::class);
    }
    public function narrative()
    {
        return $this->hasOne(Narrative::class);
    }
    public function requisition()
    {
        return $this->hasOne(Requisition::class);
    }
} 
