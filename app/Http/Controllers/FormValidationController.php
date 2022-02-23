<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationForwardFormEmail;
use App\Mail\notificationEmail;
use App\Mail\notificationLiquidationEmail;
use App\Mail\notificationNarrativeEmail;
use App\Mail\notificationRequisitionEmail;

class FormValidationController extends Controller
{
    public function activityProposalAdd(Request $request)
    {
        $form = new Form;

        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + 5 random character
        $pin = mt_rand(10000, 99999)
            . mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $controlNumber = str_shuffle($pin);

        $validate = $request->validate([
            'eventTitle' => 'required|max:45',
            'description' => 'required|max:200',
            'eventDate' => 'required|date|date_format:Y-m-d|after:today',
            'dateSubmitted' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'durationVal' => 'required',
            'durationUnit' => 'required',
            'venue' => 'required|max:60',
            'eventTitle' => 'required|max:45',
            'organizer' => 'required',
            'coorgName' => 'required',
            'coorganizer' => 'required',
            'coorgContact' => 'required|regex:/(09)[0-9]{9}/',
            'coorgEmail' => 'required|email',
            'actClassificationB' => 'required',
            'actClassificationA' => 'required',
            'service' => 'required|max:50',
            'dateNeeded' => 'required|date|date_format:Y-m-d|after:today',
            'serviceVenue' => 'required|max:60',
            'description' => 'required|max:200',
            'rationale' => 'required|max:100',
            'outcome' => 'required|max:200',
            'primaryAud' => 'required|max:40',
            'primaryNum' => 'required',
            'secondaryAud' => 'required|max:40',
            'secondaryNum' => 'required',
            'programme' => 'required|max:150',
            'programStartDate' => 'required|date|date_format:Y-m-d|after:today',
            'progEndDate' => 'required|date|date_format:Y-m-d|after_or_equal:today',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'APF',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => $controlNumber,
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,

        ]);

        //Next Approver
        Mail::to('sampleAdviser@outlook.com')->send(new notificationForwardFormEmail());
        //Sender
        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationEmail());

        return redirect('/home');
    }


    public function requisitionAdd(Request $request)
    {
        $form = new Form;

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999)
            . mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)];

        $controlNumber = str_shuffle($pin);

        $validate = $request->validate([
            'eventTitle' => 'required|45',
            'controlNum' => 'required',
            'dateFiled' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'dateNeeded' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'paymentMethod' => 'required',
            'qty' => 'required|min:1',
            'particulars' => 'required|max:45',
            'cost' => 'required|numeric|between:0,99999.99',
            'remarks' => 'required|max:100',
            'chargeTo' => 'required|max:45',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'Requisition',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => $controlNumber,
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'Pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,

        ]);

        //Next Approver
        Mail::to('sampleAdviser@outlook.com')->send(new notificationForwardFormEmail());
        //Sender
        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationRequisitionEmail());

        return redirect('/home');
    }

    public function narrativeAdd(Request $request)
    {

        $form = new Form;

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999)
            . mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)];

        $controlNumber = str_shuffle($pin);

        $validate = $request->validate([
            'eventDate' => 'required|date|date_format:Y-m-d',
            'narration' => 'required|max:250',
            'actTitle' => 'required|max:50',
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'section' => 'required|max:20',
            'message' => 'required|max:150',
            'type' => 'required|max:15',
            'rating' => 'required|max:10',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'Narrative',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => $controlNumber,
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'Pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,
        ]);

        //Next Approver

        Mail::to('sampleAdviser@outlook.com')->send(new notificationForwardFormEmail());
        //Sender
        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationNarrativeEmail());

        return redirect('/home');
    }

    public function liquidationAdd(Request $request)
    {

        $form = new Form;

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $pin = mt_rand(10000, 99999)
            . mt_rand(10000, 99999)
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)];

        $controlNumber = str_shuffle($pin);

        $validate = $request->validate([
            'eventTitle' => 'required|45',
            'eventDate' => 'required|date|date_format:Y-m-d',
            'cashAdvance' => 'required|numeric|between:0,99999.99',
            'cvNumber' => 'required',
            'deduct' => 'required',
            'qty' => 'required|min:1',
            'particulars' => 'required|max:45',
            'amount' => 'required',
        ]);

        $form->create([
            'createdBy' => auth()->user()->id,
            'formType' => 'Liquidation',
            'orgName' =>  auth()->user()->studentOrg[0]->orgName,
            'controlNumber' => $controlNumber,
            'eventTitle' => $request['eventTitle'],
            'currApprover' => 'adviser',
            'status' => 'Pending',
            'adviserIsApprove' => 0,
            'saoIsApprove' => 0,
            'acadServIsApprove' => 0,
            'financeIsApprove' => 0,
        ]);

        $data = [
            'formType' => 'Liquidation',
        ];

        //Next Approver
        Mail::to('sampleAdviser@outlook.com')->send(new notificationForwardFormEmail($data));
        //Sender
        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationLiquidationEmail($data));

        return redirect('/home');
    }
}
