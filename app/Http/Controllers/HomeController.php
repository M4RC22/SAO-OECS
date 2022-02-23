<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Organizations;
use App\Models\User;
use App\Models\Form;
use App\Models\Proposal;
use App\Models\LogisiticalNeed;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get the Organization of Authenticated user and Position (Student)
        $user = auth()->user();

        if($user->userType === "Student"){
             //Get Student Organization User
            $userOrg = $user->studentOrg()->value("organizations.orgName");
            $userPos = auth()->user()->studentOrg()->value("organization_user.position");
            $dispForm = DB::table('forms')->where('orgName', $userOrg)->where('status', 'Pending')->orWhere('status', 'Denied')->get();

            $creators = [];
        
            foreach($dispForm as $userId){
                $creator = DB::table('users')->where('id', $userId->createdBy)->get();
    
                array_push($creators, $creator);
            }

            return view('/tabs/dashboard', compact('user', 'userOrg', 'userPos', 'dispForm', 'creators'));
        }
        elseif($user->userType === "Professor"){
            if($user->studentOrg()->exists($user->id)){
                //Get Faculty Department
                $userPos = $user->userFaculty()->value('faculties.position');
                $userDeptId = $user->userFaculty()->value('faculties.department_id');
                $userOrg = $user->studentOrg()->value("organizations.orgName");
                $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);

                return view('/tabs/dashboard', compact('user', 'userPos', 'userDept', 'userOrg'));

            }else{
                if(DB::table('org_applications')->where('faculty_id', $user->id)->exists()){
                    $submitted = true;
                    return view('tabs/application', compact('submitted'));
                }
                else{
                    $submitted = false;
                    return view('tabs/application', compact('submitted'));
                }  
            }
        }
        elseif($user->userType === "NTP"){
            //Get Staff Department
            $userPos = $user->userStaff()->value('staff.position');
            $userDeptId = $user->userStaff()->value('staff.department_id');
            $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);

              //Charts
                //1.Calender

                //2.Events

                $proposals = [];
                $events = [];

                $getApprovedAPF = DB::table('forms')->where('status','Approved')->where('formType', 'APF')->get();

                foreach($getApprovedAPF as $APF){
                    $proposal = DB::table('proposals')->where('form_id', $APF->id)->orderBy('targetDate', 'asc')->get();

                    array_push($proposals, $proposal);
                }    
                
                foreach($proposals as $proposal){
                    $approvedForm = DB::table('forms')->where('id', $proposal[0]->form_id)->get();

                    array_push($events, $approvedForm);
                }   

                //3.Summary

                $submittedForms = [];
                $narrativeForms = [];
                $liquidationForms = [];
                $pendingForms = [];
                $approvedForms = [];

                $organizations = DB::table('organizations')->get();
                //Total Number of submitted Forms
                foreach($organizations as $organization)
                {
                    $submittedForm = DB::table('forms')->where('orgName', $organization->orgName)->count();
                    array_push($submittedForms, $submittedForm);
                }
                //Total Number of Narrative Forms
                foreach($organizations as $organization)
                {
                    $narrativeForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Narrative')->count();
                    array_push($narrativeForms, $narrativeForm);
                }
                //Total Number of Liquidation Forms
                foreach($organizations as $organization)
                {
                    $liquidationForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Liquidation')->count();
                    array_push($liquidationForms, $liquidationForm);
                }
                //Total Number of Pending Forms
                foreach($organizations as $organization)
                {
                    $pendingForm = DB::table('forms')->where('orgName', $organization->orgName)->where('status', 'Pending')->count();
                    array_push($pendingForms, $pendingForm);
                }
                //Total Number of Approved Forms
                foreach($organizations as $organization)
                {
                    $approvedForm = DB::table('forms')->where('orgName', $organization->orgName)->where('status', 'Approved')->count();
                    array_push($approvedForms, $approvedForm);
                }

                //4.Charts
                $liquidationApproved = DB::table('forms')->where('status', 'Approved')->where('formType', 'Liquidation')->count();
                $liquidationPending = DB::table('forms')->where('status', 'Pending')->where('formType', 'Liquidation')->count();
                $narrativeApprove = DB::table('forms')->where('status', 'Approved')->where('formType', 'Narrative')->count();
                $narrativePending = DB::table('forms')->where('status', 'Pending')->where('formType', 'Narrative')->count();
    
         
            return view('tabs/dashboard', compact('user', 'userPos', 'userDept', 'organizations', 'events' ,'proposals', 'submittedForms', 'narrativeForms', 'liquidationForms', 'pendingForms', 'approvedForms', 'liquidationApproved', 'liquidationPending', 'narrativeApprove', 'narrativePending'));

        }
        else{
            return view('tabs/dashboard');
        }
    }

    public function activityProposal()
    {
        $user = auth()->user();

        $org = $user->studentOrg;


        $orgMem = DB::table('organization_user')->where('organization_id', $org[0]->id)->get();

        $orgMembers = [];

        foreach($orgMem as $member){
            $orgMember = DB::table('users')->where('id', $member->user_id)->get();
        
            array_push($orgMembers, $orgMember);
        }
       
        return view('/tabs/forms/activityProposal', compact('orgMembers', 'org'));
    }

    public function requisition()
    {
        $user = auth()->user();

        $org = $user->studentOrg;

        $orgForms = DB::table('forms')->where('orgName', $org[0]->orgName)->where('formType', 'APF')->get();

        return view('/tabs/forms/requisition', compact('orgForms'));
    }

    public function narrative()
    {
        return view('/tabs/forms/narrative');
    }

    public function liquidation()
    {
        return view('/tabs/forms/liquidation');
    }


    public function trackForm($form)
    {

        $form = Form::findOrFail($form);

       return view ('/tabs/tracking', compact('form'));

    }


}
