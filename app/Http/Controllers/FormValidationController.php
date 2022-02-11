<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form;

class FormValidationController extends Controller
{
    public function activityProposalAdd(Request $request)
    {
        $form = new Form;

        $validate = $request->validate([
            'eventTitle' => 'required',
            'description' => 'required',
            'eventDate' =>'required',
            'durationVal' => 'required',
            'durationUnit' =>'required',
            'venue' => 'required',
            'eventTitle' => 'required',
            'dateSubmitted' => 'required',
            'organizer' => 'required', //heeree
            'coorgName' => 'required',
            'coorganizer' =>'required',
            'coorgContact' => 'required',
            'coorgEmail' => 'required',
            'actClassificationB' => 'required',
            'actClassificationA' => 'required',
            'service' => 'required',
            'dateNeeded' => 'required',
            'serviceVenue' =>'required',
            'description' =>'required',
            'rationale' => 'required',
            'outcome' => 'required',
            'primaryAud' => 'required',
            'primaryNum' => 'required',
            'secondaryAud' => 'required',
            'secondaryNum' => 'required',
            'programme' => 'required',
            'programStartDate' => 'required',
            'progEndDate' => 'required',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'APF:B',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => '123123123',
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,

        ]);
        
        return redirect('/home');

    }
    public function requisitionAdd(Request $request)
    {
        $form = new Form;

        $validate = $request->validate([
            'eventTitle' => 'required',
            'controlNum' => 'required',
            'dateFiled' =>'required',
            'dateNeeded' => 'required',
            'paymentMethod' =>'required',
            'qty' => 'required',
            'particulars' => 'required',
            'cost' => 'required',
            'remarks' => 'required', //heeree
            'chargeTo' => 'required',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'RF',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => '123123123',
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,
        ]);
        
        return redirect('/home');
    }

    public function narrativeAdd(Request $request)
    {
        $form = new Form;

        $validate = $request->validate([
            'eventDate' => 'required',
            'narration' =>'required',
            'actTitle' => 'required',
            'targetDate' =>'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'section' => 'required',
            'message' => 'required',
            'type' => 'required',
            'rating' => 'required',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'RF',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => '123123123',
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,
        ]);
        
        return redirect('/home');
    }

    public function liquidationAdd(Request $request)
    {
        $form = new Form;

        $validate = $request->validate([
            'eventDate' => 'required',
            'cashAdvance' =>'required',
            'cvNumber' => 'required',
            'deduct' =>'required',
            'qty' => 'required',
            'particulars' => 'required',
            'amount' => 'required',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'RF',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => '123123123',
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,
        ]);
        
        return redirect('/home');
    }




}
