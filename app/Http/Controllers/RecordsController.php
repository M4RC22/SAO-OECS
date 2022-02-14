<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use PDF;


class RecordsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user->userType === "Professor" || $user->userType === "Student" ){
            if($user->studentOrg()->exists($user->id)){
                $orgId = $user->studentOrg()->value('organization_id');
                $orgName = DB::table('organizations')->where('id', $orgId)->pluck('orgName');

                $records = DB::table('forms')->where('orgName', $orgName)->where('status', 'Approved')->get();


                return view('tabs/records', compact('records')); 

            
                }
            }
            else if($user->userType === "NTP"){
                $userPos = $user->userStaff()->value('staff.position');
                $userDeptId = $user->userStaff()->value('staff.department_id');
                $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);
             
                if($userDept[0]->name === "Academic Services"){
                    if($userPos === "SAO Head"){
                     

                    }
                    else{
                    
             
                    }
                }
                else if($userDept[0]->name === "Finance"){
                  

        
            }
        }
    }

    public function downloadForm($form)
    {



        $form = Form::findOrFail($form);
        
        if($form->formType === "APF"){
            $proposal = $form->proposal;
            $logisticalNeeds = $proposal->logisticalNeed;
            $activities = $proposal->activity;
            $externalCoorganizers = $proposal->externalCoorganizer;
            
             //Get Spefic Column in proposal table
            $organizerId = $proposal->organizer;
            $adviserId = $form -> adviserFacultyId;
            $saoHeadId = $form -> saoFacultyId;
            $acadServId = $form -> acadServFacultyId; //It should be Staff
            $fianceId =  $form -> financeStaffId;

            //Get Details 
            $adviser = DB::table('users')->where('id', $adviserId)->get();
            $saoHead = DB::table('users')->where('id', $saoHeadId)->get();
            $acadServ = DB::table('users')->where('id', $acadServId)->get();
            $finance = DB::table('users')->where('id', $fianceId)->get();
            $organizer = DB::table('users')->where('id', $organizerId)->get();


            $pdf = PDF::loadView('/pdf/activityProposalPDF', compact('form', 'proposal', 'logisticalNeeds', 'activities', 'externalCoorganizers','organizer', 'adviser', 'saoHead', 'acadServ', 'finance'));
            return $pdf->download($form->formType.' - '.$form->orgName.' - '.$form->eventTitle.'.pdf');
            
        }
        else if($form->formType === 'Requisition'){
            $requisition = $form->requisition;
            $requisitionItem = $requisition->requisitionItem;

            return view('submittedForms/requisition', compact('form', 'requisition', 'requisitionItem'));
            
        }
        elseif ($form->formType === 'Narrative'){
            $narrative = $form->narrative;
            $programs = $narrative->program;
            $participants = $narrative->participant;
            $posters = $narrative->narrativeImage->where('type', 'poster');
            $eventImages = $narrative->narrativeImage->where('type', 'eventImage');
            $comments = $narrative->commentSuggestion->where('type', 'comment');
            $suggestions = $narrative->commentSuggestion->where('type', 'suggestion');

            return view ('submittedForms/narrative', compact('form', 'narrative', 'programs', 'participants', 'posters', 'eventImages', 'comments', 'suggestions'));
        }
        else if($form->formType === 'Liquidation'){
            $liquidation = $form->liquidation;
            $liquidationItems = $liquidation->liquidationItem;
            $proofOfPayments = $liquidation->proofOfPayment;

            return view('submittedForms/liquidation', compact('form', 'liquidation', 'liquidationItems', 'proofOfPayments'));
    
        }
    
    }
}
