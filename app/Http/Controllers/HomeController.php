<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Organizations;
use App\Models\User;

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
            $dispForm = DB::select('select * from forms where orgName = ?', [$userOrg]);


            return view('/tabs/dashboard', compact('user', 'userOrg', 'userPos', 'dispForm'));
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
                return view('tabs/application');
            }
        }
        elseif($user->userType === "NTP"){
            //Get Staff Department
            $userPos = $user->userStaff()->value('staff.position');
            $userDeptId = $user->userStaff()->value('staff.department_id');
            $userDept = DB::select('select * from departments where id = ?', [$userDeptId]);

            return view('tabs/dashboard', compact('user', 'userPos', 'userDept'));

        }
        else{
            return view('tabs/records');
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

    public function activityProposalAdd(Request $request)
    {
    
        $validate = $request->validate([
            'eventTitle' => 'required',
            'description' => 'required'
        ]);
        
        
    }

    public function requisition()
    {
        return view('/tabs/forms/requisition');
    }
    public function requisitionAdd(Request $request)
    {
        dd($request->all());

    }

    public function narrative()
    {
        return view('/tabs/forms/narrative');
    }
    public function narrativeAdd(Request $request)
    {
        dd($request->all());
    }

    public function liquidation()
    {
        return view('/tabs/forms/liquidation');
    }
    public function liquidationAdd(Request $request)
    {
        dd($request->all());
    }


    public function records()
    {
        return view('/tabs/records');
    }



        public function applicants(){
            return view('/tabs/applicants');
        }
    }














    // public function index()
    // {   
    //     $user = auth()->user();

    //     $userPos = $user->studentOrg()->value("organization_user.position");

    //     //Get the list of id that belongs to organization of authenticated user
    //     $currUserOrg = $user->studentOrg()->value("organizations.id");

    //     $orgMemId = DB::select('select * from organization_user where organization_id = ?', [$currUserOrg]);

    //     //Return users that are part of authenticated user's organization
    //     $orgMembers = [];
        
    //     foreach($orgMemId as $userId){
    //         $orgMember = DB::select('select id, firstName, lastName from users where id = ?', [$userId->user_id]);

    //         array_push($orgMembers, $orgMember);
    //     }
        
    //     $count = 0;
    //     foreach($orgMemId as $userId){
    //         $orgMember = DB::select('select position from organization_user where user_id = ?', [$userId->user_id]);
    //         array_push($orgMembers[$count], $orgMember[0]);
    //         $count++;
    //     }

    //         return view('/tabs/roles', compact('user', 'userPos', 'orgMembers'));
    //     }