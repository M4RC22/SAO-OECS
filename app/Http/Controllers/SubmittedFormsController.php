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
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationEmail;
use App\Mail\notificationLiquidationEmail;
use App\Mail\notificationNarrativeEmail;
use App\Mail\notificationForwardFormEmail;
use App\Mail\notificationFormApprovedEmail;
use App\Mail\approvedFormEmail;
use App\Mail\notificationDeniedFormEmail;

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
                $forms = DB::table('forms')->where('currApprover', 'adviser')->where('orgName', $orgName)->where('status', 'Pending')->get();

                    return view('/tabs/submittedForms', compact('forms'));
                }
            }
            else if($user->userType === "NTP"){
                $userPos = $user->userStaff()->value('staff.position');
                $userDeptId = $user->userStaff()->value('staff.department_id');
                $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);
             
                if($userDept[0]->name === "Academic Services"){
                    if($userPos === "SAO Head"){
                        $forms = DB::table('forms')->where('currApprover', 'saoHead')->where('status', 'Pending')->get();

                        return view('/tabs/submittedForms', compact('forms'));
                    }
                    else{
                        $forms = DB::table('forms')->where('currApprover', 'acadServ')->where('status', 'Pending')->get();

                        return view('/tabs/submittedForms', compact('forms'));
                    }
                }
                else if($userDept[0]->name === "Finance"){
                    $forms = DB::table('forms')->where('currApprover', 'finance')->where('status', 'Pending')->get();

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
            // $totalCost = $requisitionItem->unitCost;

        
            return view('submittedForms/requisition', compact('form', 'requisition', 'requisitionItem'));
            
        }
        elseif ($form->formType === 'Narrative'){
            $narrative = $form->narrative;
            $programs = $narrative->program;
            $participants = $narrative->participant;
            $posters = $narrative->narrativeImage->where('type', 'poster');
            $eventImages = $narrative->narrativeImage->where('type', 'photo');
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

        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('y-m-d H:i');

        $form = Form::findOrFail($form); 
      
        if($user->userType === "Professor"){
            if($user->studentOrg()->exists($user->id)){

                $form->currApprover = "saoHead";
                $form->adviserFacultyId = $user->id;
                $form->adviserIsApprove = 1;
                $form->adviserDateApproved = $dateTime;
                $form->save();

                //email to Sender and Next Approver
                //Sender
                Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationFormApprovedEmail());
                //Next Approver
                Mail::to('sampleSaoHead@outlook.com')->send(new notificationForwardFormEmail());
        
                return redirect('submittedForms');
            }
        }
        else if($user->userType === "NTP"){
            $userPos = $user->userStaff()->value('staff.position');
            $userDeptId = $user->userStaff()->value('staff.department_id');
            $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);

            if($userDept[0]->name === "Academic Services"){
                if($userPos === "SAO Head"){

                    $form->saoStaffId = $user->id;
                    $form->saoISApprove = 1;
                    $form->saoDateApproved = $dateTime;

                    if($form->formType === "Narrative"){
                        $form->status = 'Approved';
                        $form->currApprover = "saoHead";
                        $form->save();

                        //email to Sender ONLY
                        Mail::to('mericahuerta@student.apc.edu.ph')->send(new approvedFormEmail());
                    }
                    else{
                        $form->currApprover = "acadServ";
                        $form->save();

                        //email to Sender and Next Approver
                        //Sender
                        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationFormApprovedEmail());
                        //Next Approver
                        Mail::to('sampleAcadServ@outlook.com')->send(new notificationForwardFormEmail());
                    }

                    return redirect('submittedForms');
                }
                else{

                    $form->currApprover = "finance";
                    $form->acadServStaffId = $user->id;
                    $form->acadServIsApprove = 1;
                    $form->acadServDateApproved = $dateTime;
                    $form->save();

                    //email to Sender and Next Approver
                    //Sender
                    Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationFormApprovedEmail());
                    //Next Approver
                    Mail::to('sampleFinance@outlook.com')->send(new notificationForwardFormEmail());

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

                //email to Sender ONLY
                Mail::to('mericahuerta@student.apc.edu.ph')->send(new approvedFormEmail());

                return redirect('submittedForms');
            }    
        }
    }

    public function deny($form, Request $request)
    {
        $user = auth()->user();

        $form = Form::findOrFail($form);

        $message = $user->firstName .' '. $user->lastName. ': ' .$request->feedback;

     
       if($request->feedback != null){
            $form->update(
            [
                'status'=> "Denied",
                'remarks'=> $message,
            ]
        );
            //email to Sender ONLY
            Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationDeniedFormEmail());
                
            return redirect('submittedForms');
       }
       else{

            $feedback = $request->feedback;

            return redirect()->back()->with('errorInDeny', 'Ooops! Please Provide Feedback.')->with(compact('feedback'));
       }
    }
}
