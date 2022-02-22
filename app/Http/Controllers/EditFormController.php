<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Models\RequisitionItem;
use App\Models\Program;
use App\Models\Participant;
use App\Models\CommentSuggestion;
use App\Models\LiquidationItem;
use App\Models\LogisticalNeed;
use App\Models\Activity;



class EditFormController extends Controller
{
    public function apfEdit($form){

    $user = auth()->user();

    $form = Form::findOrFail($form);

    //Get Whole Row
    $proposal = $form->proposal;
    $logisticalNeeds = $proposal->logisticalNeed;
    $activities = $proposal->activity;
    $externalCoorganizers = $proposal->externalCoorganizer;

   
    $org = $user->studentOrg;


    $orgMem = DB::table('organization_user')->where('organization_id', $org[0]->id)->get();

    $orgMembers = [];

    foreach($orgMem as $member){
        $orgMember = DB::table('users')->where('id', $member->user_id)->get();
    
        array_push($orgMembers, $orgMember);
    }
   

    return view('editForms/activityProposalEdit', compact('form', 'proposal', 'logisticalNeeds', 'activities', 'externalCoorganizers', 'orgMembers'));
        
    }

    // 
    // 
    // APF UPDATE
    // 
    // 

    public function apfUpdate($form, Request $request){

        $form = Form::findOrFail($form);

        $form->update(
            [
                'eventTitle' => $request-> eventTitle,
                'status'=> "Pending",
                'remarks'=> null,
            ]
        );

        $form->proposal()->update(
            [
                'organizer' => $request-> organizer,
                'targetDate'=> $request-> eventDate,
                'durationVal'=> $request-> durationVal,
                'durationUnit' => $request-> durationUnit,
                'venue'=> $request-> venue,
                'actClassificationA'=> $request-> actClassificationA,
                'actClassificationB' => $request-> actClassificationB,
                'description'=> $request-> description,
                'outcome'=> $request-> outcome,
                'rationale' => $request-> rationale,
                'primaryAudience'=> $request-> primaryAud,
                'numPrimaryAudience'=>$request-> primaryNum,
                'secondaryAudience' => $request-> secondaryAud,
                'numSecondaryAudience'=> $request-> secondaryNum,
                
            ]);

        $form->proposal->externalCoorganizer()->sync([]);

        for($i = 0; $i < count($request->coorgName); $i++){
            $form->proposal->externalCoorganizer()->create(
                [
                    'coorganization' => $request->coorgName[$i],
                    'coorganizer' => $request->coorganizer[$i],
                    'email' => $request->coorgEmail[$i],
                    'phoneNumber' => $request->coorgContact[$i],
                ]);
        }

        LogisticalNeed::where('proposal_id', $form->proposal->id)->get()->each->delete();

        for($i = 0; $i < count($request->service); $i++){
            $form->proposal->logisticalNeed()->create(
                [
                    'service' => $request->service[$i],
                    'dateNeeded' => $request->dateNeeded[$i],
                    'venue' => $request->serviceVenue[$i],
                ]);
        }

        Activity::where('proposal_id', $form->proposal->id)->get()->each->delete();

        for($i = 0; $i < count($request->programme); $i++){
            $form->proposal->activity()->create(
                [
                    'activity' => $request->programme[$i],
                    'startDate' => $request->progStartDate[$i],
                    'endDate' => $request->progEndDate[$i],
                ]);
        }

        return redirect('home');

    }

    public function requisitionEdit($form){

        $form = Form::findOrFail($form);   
        
        $requisition = $form->requisition;
        $requisitionItem = $requisition->requisitionItem;

        return view('editForms/requisitionEdit', compact('form', 'requisition', 'requisitionItem'));
    }

    public function requisitionUpdate($form, Request $request){

        $form = Form::findOrFail($form);

        RequisitionItem::where('requisition_id', $form->requisition->id)->get()->each->delete();

        $form->update(
            [
                'status'=> "Pending",
                'remarks'=> null,
            ]
        );

        $form->requisition()->update(
            [
                'type' => $request->paymentMethod,
                'remarks' => $request->remarks,
                'chargedDepartment' => $request->chargeTo,
            ]);

        for($i = 0; $i < count($request->qty); $i++){
            $form->requisition->requisitionItem()->create(
                [
                    'quantity' => $request->qty[$i],
                    'purpose' => $request->purpose[$i],
                    'unitCost' => $request->cost[$i],
                ]);
        }

        return redirect('home');
    }

    public function narrativeEdit($form)
    {

        $form = Form::findOrFail($form);   

        $narrative = $form->narrative;
        $programs = $narrative->program;
        $participants = $narrative->participant;
        $posters = $narrative->narrativeImage->where('type', 'poster');
        $eventImages = $narrative->narrativeImage->where('type', 'photo');
        $comments = $narrative->commentSuggestion->where('type', 'comment');
        $suggestions = $narrative->commentSuggestion->where('type', 'suggestion');
    
        return view ('editForms/narrativeEdit', compact('form', 'narrative', 'programs', 'participants', 'posters', 'eventImages', 'comments', 'suggestions'));
    }

    public function narrativeUpdate($form, Request $request){

        $form = Form::findOrFail($form);

        $form->update(
            [   
                'evenTitle' => $request->eventTitle,
                'status'=> "Pending",
                'remarks'=> null,
        ]);


        $form->narrative()->update(
            [
                'eventDate' => $request->eventDate,
                'narration' => $request->narration,

            ]);

        Program::where('narrative_id', $form->narrative->id)->get()->each->delete();

        for($i = 0; $i < count($request->actTitle); $i++){
            $form->narrative->program()->create(
                [
                    'activity' => $request->actTitle[$i],
                    'startDate' => $request->startDate[$i],
                    'endDate' => $request->endDate[$i],
                ]);
        }

        Participant::where('narrative_id', $form->narrative->id)->get()->each->delete();    

        for($i = 0; $i < count($request->firstName); $i++){

            $form->narrative->participant()->create(
                [
                    'firstName' => $request->firstName[$i],
                    'lastName' => $request->lastName[$i],
                    'section' => $request->section[$i],
                    'participatedDate' => $request->participatedDate[$i],
                ]);
        }

        CommentSuggestion::where('narrative_id', $form->narrative->id)->get()->each->delete();    

        for($i = 0; $i < count($request->comments); $i++){
            $form->narrative->commentSuggestion()->create(
                [
                    'message' => $request->comments[$i],
                    'type' => 'comment',
                    
                ]);
        }

        for($i = 0; $i < count($request->suggestions); $i++){
            $form->narrative->commentSuggestion()->create(
                [
                    'message' => $request->suggestions[$i],
                    'type' => 'suggestion',
                    
                ]);
        }

        return redirect('home');
    }

    public function liquidationEdit($form){

        $form = Form::findOrFail($form);   

        $liquidation = $form->liquidation;
        $liquidationItems = $liquidation->liquidationItem;
        $proofOfPayments = $liquidation->proofOfPayment;

        return view('editForms/liquidationEdit', compact('form', 'liquidation', 'liquidationItems', 'proofOfPayments'));
    }

    public function liquidationUpdate($form, Request $request){
        
        $form = Form::findOrFail($form);   

        $form->update(
            [   
                'evenTitle' => $request->eventTitle,
                'status'=> "Pending",
                'remarks'=> null,
            ]);

        $form->liquidation()->update(
            [
                'eventDate' => $request->eventDate,
                'cashAdvance' => $request->cashAdvance,
                'cvNumber' => $request->cvNumber,
                'deduct' => $request->deduct,
            ]);

        LiquidationItem::where('liquidation_id', $form->liquidation->id)->get()->each->delete();

        for($i = 0; $i < count($request->dateBought); $i++){
            $form->liquidation->liquidationItem()->create(
                [
                    'dateBought' => $request->dateBought[$i],
                    'particulars' => $request->particulars[$i],
                    'amountPerDay' => $request->amount[$i],   
                ]);
        }

        return redirect('home');
    }
}
