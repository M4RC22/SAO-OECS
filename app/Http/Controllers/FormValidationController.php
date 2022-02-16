<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form;
use Intervention\Image\Facades\Image;

class FormValidationController extends Controller
{
    public function activityProposalAdd(Request $request)
    {
        $form = new Form;

        // $validate = $request->validate([
        //     'eventTitle' => 'required|max:45',
        //     'description' => 'required|max:200',
        //     'eventDate' =>'required',
        //     'durationVal' => 'required',
        //     'durationUnit' =>'required',
        //     'venue' => 'required',
        //     'eventTitle' => 'required',
        //     'dateSubmitted' => 'required',
        //     'organizer' => 'required', //heeree
        //     'coorgName' => 'required',
        //     'coorganizer' =>'required',
        //     'coorgContact' => 'required',
        //     'coorgEmail' => 'required',
        //     'actClassificationB' => 'required',
        //     'actClassificationA' => 'required',
        //     'service' => 'required',
        //     'dateNeeded' => 'required',
        //     'serviceVenue' =>'required',
        //     'description' =>'required',
        //     'rationale' => 'required',
        //     'outcome' => 'required',
        //     'primaryAud' => 'required',
        //     'primaryNum' => 'required',
        //     'secondaryAud' => 'required',
        //     'secondaryNum' => 'required',
        //     'programme' => 'required',
        //     'programStartDate' => 'required',
        //     'progEndDate' => 'required',
        // ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'APF',
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

    public function narrativeAdd(Request $request){
        
        $form = new Form;

        // $validate = $request->validate([
        //     'eventDate' => 'required',
        //     'narration' =>'required',
        //     'actTitle' => 'required',
        //     'targetDate' =>'required',
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'section' => 'required',
        //     'message' => 'required',
        //     'type' => 'required',
        //     'rating' => 'required',
        // ]);

            $form->create([
                'createdBy' => auth()->user()->id,
                'formType' => 'Narrative',
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

        public function liquidationAdd(Request $request){

            $form = new Form;

            // $validate = $request->validate([
            //     'eventDate' => 'required',
            //     'cashAdvance' =>'required',
            //     'cvNumber' => 'required',
            //     'deduct' =>'required',
            //     'qty' => 'required',
            //     'particulars' => 'required',
            //     'amount' => 'required',
            // ]);

            $form->create([
                'createdBy' => auth()->user()->id,
                'formType' => 'Liquidation',
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
