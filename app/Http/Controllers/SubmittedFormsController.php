<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\ProposalForm\Activity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Proposal;
use App\Models\LogisiticalNeed;

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
                $orgId = $user->studentOrg()->value('organization_id');
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
                    $forms = DB::table('forms')->where('currApprover', 'finance')->where('status', 'pending')->get();

                    return view('/tabs/submittedForms', compact('forms'));
            }
        }
    }

    //View Details
    public function show($form){

        $form = Form::findOrFail($form);   

        if($form->formType === "APF"){
            //Get Whole Row
            $proposal = $form->proposal;
            $logisticalNeeds = $proposal->logisticalNeed;
            $activities = $proposal->activity;
            $externalCoorganizers = $proposal->externalCoorganizer;
            //Get Spefic Column in proposal table
            $organizerId = $proposal->organizer;
            //Get Organizer Detail
            $organizer = DB::table('users')->where('id', $organizerId)->get();

            return view('submittedForms/activityProposal', compact('form', 'proposal', 'logisticalNeeds', 'activities', 'externalCoorganizers', 'organizer'));
            
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

    public function approve($form, Request $request){

        $user = auth()->user();

        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('m-d-y H:i');

            
        $form = Form::findOrFail($form); 

        if(Hash::check($request->confirmPass, $user->password)) {
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

                        $form->saoFacultyId = $user->id;
                        $form->saoISApprove = 1;
                        $form->saoDateApproved = $dateTime;

                        if($form->formType === "Narrative"){
                            $form->status = 'Approved';
                            $form->currApprover = "saoHead";
                            $form->save();
                        }
                        else{
                            $form->currApprover = "acadServ";
                            $form->save();
                        }

                        return redirect('submittedForms');
                    }
                    else{
    
                        $form->currApprover = "finance";
                        $form->acadServFacultyId = $user->id;
                        $form->acadServIsApprove = 1;
                        $form->acadServDateApproved = $dateTime;
                        $form->save();
    
                        return redirect('submittedForms');
                        
                    }
                }
                else if($userDept[0]->name === "Finance"){
    
                    $form->currApprover = "finance";
                    $form->status = 'Approved';
                    $form->financeStaffId = $user->id;
                    $form->financeIsApprove = 1;
                    $form->financeDateApproved = $dateTime;
                    $form->save();
    
                    return redirect('submittedForms');
                }    
            }
        }
        else{  
            return back()->with('errorInApproval', 'Ooops! Your Password seems Incorrect.');
        }
    }

    public function deny($form, Request $request)
    {
        $user = auth()->user();


       if(Hash::check($request->confirmPass, $user->password)){
           dd("Good");
       }
       else{

            $feedback = $request->feedback;

            return redirect()->back()->with('errorInDeny', 'Ooops! Your Password seems Incorrect.')->with(compact('feedback'));
       }
    }
}
