<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Forms;
use App\Models\Proposals\Activities;

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
 
         // $proposal = DB::table('proposals')->where('forms_id', $form->id)->get();
 
            $proposal = $form->formProposals()->find($form);
            $activities = DB::table('activities')->where('proposals_id', $proposal[0]->id)->get(); 
 
            return view('submittedForms/activityProposal', compact('form', 'proposal', 'activities'));
             
        }
        else if($form->formType === 'Requisition'){
 
        }
        elseif ($form->formType === 'Narrative'){
 
        }
        else if($form->formType === 'Liquidation'){
 
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
                }
                else{

                    $form->currApprover = "finance";
                    $form->adviserFacultyId = $user->id;
                    $form->adviserIsApprove = 1;
                    $form->adviserDateApproved = $dateTime;
                    $form->save();
                    
                }
            }
            else if($userDept[0]->name === "Finance"){

                $form->status = 'Approved';
                $form->adviserFacultyId = $user->id;
                $form->adviserIsApprove = 1;
                $form->adviserDateApproved = $dateTime;
                $form->save();
            }    
        }
    }
}



//To change format of DATE TIME

//{{ \Carbon\Carbon::parse($user->from_date)->format('d/m/Y')}} ----> Apply this in balde file