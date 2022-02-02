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
            $userPos = auth()->user()->studentOrg()->value("organizations_user.position");

            return view('/tabs/dashboard', compact('user', 'userOrg', 'userPos'));
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
        return view('/tabs/forms/activityProposal');
    }

    public function requisition()
    {
        return view('/tabs/forms/requisition');
    }

    public function narrative()
    {
        return view('/tabs/forms/narrative');
    }

    public function liquidation()
    {
        return view('/tabs/forms/liquidation');
    }


    public function records()
    {
        return view('/tabs/records');
    }



        public function applicants(){
            return view('/tabs/applicants');
        }
    }