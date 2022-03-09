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

                //Events
                $proposals = [];
                $events = [];

                $getApprovedAPF = DB::table('forms')->where('status','Approved')->where('formType', 'APF')->where('orgName', $userOrg)->get();

                foreach($getApprovedAPF as $APF){
                    $proposal = DB::table('proposals')->where('form_id', $APF->id)->orderBy('targetDate', 'asc')->get();

                    array_push($proposals, $proposal);
                }    
                
                foreach($proposals as $proposal){
                    $approvedForm = DB::table('forms')->where('id', $proposal[0]->form_id)->get();

                    array_push($events, $approvedForm);
                }   


                //5.Finance
                $adviserAPF = DB::table('forms')->where('adviserFacultyId', $user->id)->where('formType', 'APF')->count();
                $adviserRF = DB::table('forms')->where('adviserFacultyId', $user->id)->where('formType', 'Requisition')->count();
                $adviserNR = DB::table('forms')->where('adviserFacultyId', $user->id)->where('formType', 'Narrative')->count();
                $adviserLF = DB::table('forms')->where('adviserFacultyId', $user->id)->where('formType', 'Liquidation')->count();
                $adviserTotal = $adviserAPF +  $adviserRF + $adviserLF + $adviserNR;
                
                return view('/tabs/dashboard', compact('user', 'userPos', 'userDept', 'userOrg', 'proposals', 'events', 'adviserAPF', 'adviserRF', 'adviserNR', 'adviserLF', 'adviserTotal'));

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
        elseif($user->userType === "NTP"  || $user->userType === "Professor"){
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

                $orgNarrativePending = [];
                $orgNarrativeApproved = [];
                $orgLiquidationPending = [];
                $orgLiquidationApproved = [];
                $pending = [];
                $totalSubmittedForms = [];
                $totalApprovedForms = [];

                $organizations = DB::table('organizations')->get();
             
                foreach($organizations as $organization)
                {
                    $narrativeForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Narrative')->where('status', 'Pending')->count();
                    array_push($orgNarrativePending, $narrativeForm);
                }
                //Org Narrative Approved
                foreach($organizations as $organization)
                {
                    $narrativeForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Narrative')->where('status', 'Approved')->count();
                    array_push($orgNarrativeApproved, $narrativeForm);
                }
                //Org Liquidation Pending
                foreach($organizations as $organization)
                {
                    $liquidationForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Liquidation')->where('status', 'Pending')->count();

                    array_push($orgLiquidationPending, $liquidationForm);
                }
                //Org Liquidation Approved
                foreach($organizations as $organization)
                {
                    $liquidationForm = DB::table('forms')->where('orgName', $organization->orgName)->where('formType', 'Liquidation')->where('status', 'Approved')->count();

                    array_push($orgLiquidationApproved, $liquidationForm);
                }
                //Total Number of Pending Forms
                foreach($organizations as $organization)
                {
                    $pendingForm = DB::table('forms')->where('orgName', $organization->orgName)->where('status', 'Pending')->count();
                    array_push($pending, $pendingForm);
                }
                //Total Number of submitted Forms
                foreach($organizations as $organization)
                {
                    $submittedForm = DB::table('forms')->where('orgName', $organization->orgName)->count();
                    array_push($totalSubmittedForms, $submittedForm);
                }
                //Total Number of Approved Forms
                foreach($organizations as $organization)
                {
                    $approvedForm = DB::table('forms')->where('orgName', $organization->orgName)->where('status', 'Approved')->count();
                    array_push($totalApprovedForms, $approvedForm);
                }

                //4.Charts
                $liquidationApproved = DB::table('forms')->where('status', 'Approved')->where('formType', 'Liquidation')->count();
                $liquidationPending = DB::table('forms')->where('status', 'Pending')->where('formType', 'Liquidation')->count();
                $narrativeApproved = DB::table('forms')->where('status', 'Approved')->where('formType', 'Narrative')->count();
                $narrativePending = DB::table('forms')->where('status', 'Pending')->where('formType', 'Narrative')->count();


                //5.AcadServ
                $acadServAPF = DB::table('forms')->where('acadServIsApprove', true)->where('formType', 'APF')->count();
                $acadServRF = DB::table('forms')->where('acadServIsApprove', true)->where('formType', 'Requisition')->count();
                $acadServLF = DB::table('forms')->where('acadServIsApprove', true)->where('formType', 'Liquidation')->count();
                $acadServTotal = $acadServAPF +  $acadServRF + $acadServLF;

                 //5.Finance
                 $financeAPF = DB::table('forms')->where('financeIsApprove', true)->where('formType', 'APF')->count();
                 $financeRF = DB::table('forms')->where('financeIsApprove', true)->where('formType', 'Requisition')->count();
                 $financeLF = DB::table('forms')->where('financeIsApprove', true)->where('formType', 'Liquidation')->count();
                 $financeTotal = $financeAPF +  $financeRF + $financeLF;

                 

    
            return view('tabs/dashboard', compact('user', 'userPos', 'userDept', 'organizations', 'events' ,'proposals', 'orgNarrativePending', 'orgNarrativeApproved', 'orgLiquidationPending', 'orgLiquidationApproved', 'pending','totalSubmittedForms', 'totalApprovedForms',   'liquidationApproved', 'liquidationPending', 'narrativeApproved', 'narrativePending', 'acadServAPF', 'acadServRF', 'acadServLF', 'acadServTotal', 'financeAPF', 'financeRF', 'financeLF', 'financeTotal'));

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
