<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Forms;
use App\Models\ProposalForm\Activities;

use App\Models\Proposals;
use App\Models\LogisiticalNeeds;

class SubmittedFormsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = auth()->user();

        if($user->userType === "Professor"){
            if($user->studentOrg()->exists($user->id)){
                $orgId = $user->studentOrg()->value('organizations_id');
                $orgName = DB::table('organizations')->where('id', $orgId)->pluck('orgName');

                $forms = DB::table('forms')->where('currApprover', 'adviser')->where('orgName', $orgName)->get();

                    return view('/tabs/submittedForms', compact('forms'));
                }
            }
            else if($user->userType === "NTP"){
                $userPos = $user->userStaff()->value('staff.position');
                $userDeptId = $user->userStaff()->value('staff.department_id');
                $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);
             
                if($userDept[0]->name === "Academic Services"){
                    if($userPos === "SAO Head"){
                        $forms = DB::table('forms')->where('currApprover', 'saoHead')->get();

                        return view('/tabs/submittedForms', compact('forms'));
                    }
                    else{
                        $forms = DB::table('forms')->where('currApprover', 'acadServ')->get();

                        return view('/tabs/submittedForms', compact('forms'));
                    }
                }
                else if($userDept[0]->name === "Finance"){
                    $forms = DB::table('forms')->where('currApprover', 'finance')->get();

                    return view('/tabs/submittedForms', compact('forms'));
            }
        }
    }

    //View Details
    public function show($form){

        $form = Forms::findOrFail($form);   

        if($form->formType === "APF:B"){
            $proposal = $form->proposal;
            $logisticalNeeds = $proposal->logisticalNeed;
            $activities = $proposal->activity;
            $externalCoorganizers = $proposal->externalCoorganizer;

            return view('submittedForms/activityProposal', compact('form', 'proposal', 'logisticalNeeds', 'activities', 'externalCoorganizers'));
             
        }
        else if($form->formType === 'Requisition'){
            
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

    public function approve($form){

        $user = auth()->user();

        // $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('F j, Y h:i A');

        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('m-d-y H:i');

        $form = Forms::findOrFail($form); 

        if($user->userType === "Professor"){
            if($user->studentOrg()->exists($user->id)){

                $form->currApprover = "saoHead";
                $form->adviserFacultyId = $user->id;
                $form->adviserIsApprove = 1;
                $form->adviserDateApproved = $dateTime;
                $form->save();
        
                return redirect('submittedForms');

            }
        }
        else if($user->userType === "NTP"){
            $userPos = $user->userStaff()->value('staff.position');
            $userDeptId = $user->userStaff()->value('staff.department_id');
            $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);

            
            if($userDept[0]->name === "Academic Services"){
                if($userPos === "SAO Head"){

                    $form->currApprover = "acadServ";
                    $form->adviserFacultyId = $user->id;
                    $form->adviserIsApprove = 1;
                    $form->adviserDateApproved = $dateTime;
                    $form->save();

                    return redirect('submittedForms');
                }
                else{

                    $form->currApprover = "finance";
                    $form->adviserFacultyId = $user->id;
                    $form->adviserIsApprove = 1;
                    $form->adviserDateApproved = $dateTime;
                    $form->save();

                    return redirect('submittedForms');
                    
                }
            }
            else if($userDept[0]->name === "Finance"){

                $form->status = 'Approved';
                $form->adviserFacultyId = $user->id;
                $form->adviserIsApprove = 1;
                $form->adviserDateApproved = $dateTime;
                $form->save();

                return redirect('submittedForms');
            }    
        }
    }
}
