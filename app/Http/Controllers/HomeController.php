<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Organizations;
use App\Models\User;
use App\Models\Form;
use App\Models\Proposal;
use App\Models\LogisiticalNeed;
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




    public function applicants(){
        return view('/tabs/applicants');
    }
    }
