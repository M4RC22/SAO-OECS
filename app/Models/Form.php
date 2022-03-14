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
        'remarks',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($form){

            $request = request();  

            if($form->formType === 'APF'){
                $form->proposal()->create([
                    'organizer' =>  $request->organizer,
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
                    'secondaryAudience' => $request->secondaryAud,
                    'numSecondaryAudience' => $request->secondaryNum,
                ]);
            }else if($form->formType === 'Requisition'){

                $data = $request->validate([
                    'paymentMethod' => 'required',
                    'remarks' => 'required|max:100',
                    'dateNeeded' => 'required|date|date_format:Y-m-d|after_or_equal:today',
                    'chargeTo' => 'required|max:45',
                ]);
                $form->requisition()->create([
                    'type' => $data['paymentMethod'],
                    'remarks' => $data['remarks'],
                    'dateNeeded' => $data['dateNeeded'],
                    'chargedDepartment' => $data['chargeTo'],
                ]);
            }
                
            else if($form->formType === 'Narrative'){

                $form->narrative()->create([
                    'narration' => $request->narration,
                    'evalrating' => $request->rating,
                    'eventDate' => $request->eventDate,              
                 ]);

            }
            else if($form->formType === 'Liquidation'){
                $form->liquidation()->create([
                    'eventDate' => $request->eventDate,
                    'cashAdvance' => $request->cashAdvance,
                    'cvNumber' => $request->cvNumber,
                    'deduct' => $request->deduct
                ]);
            }
            
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
