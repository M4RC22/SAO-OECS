<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationOrgApplicationEmail;
use App\Mail\notificationOrgApprovedEmail;
use App\Mail\notificationOrgDeniedEmail;

class OrgCreationController extends Controller
{

    public function apply(Request $request, $userId){

        if(DB::table('organizations')->where('orgName', $request->orgName)->exists()){

            return back()->with('errorInSubmission', 'Organization Name already exist!');
        }
        
        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('y-m-d H:i');

        $validate = $request->validate([
            'orgName' => 'required',
            'presidentEmail' => 'required|email',
            'description' => 'required'
        ]);

        $data = [['faculty_id' => $userId, 'proposedOrgName' => $request->orgName , 'presidentEmail' => $request->presidentEmail, 'description' => $request->description, 'created_at' => $dateTime]];

        //Email of the SaoHead
        Mail::to('sampleSaoHead@outlook.com')->send(new notificationOrgApplicationEmail());

        DB::table('org_applications')->insert($data);

        return redirect('home');
        
    }

    public function applicants(){

        $applications = DB::table('org_applications')->get();

        $advisers = [];
        
        foreach($applications as $userId){
            $adviser = DB::table('users')->where('id', $userId->faculty_id)->get();

            array_push($advisers, $adviser);
        }

        return view('/tabs/applicants', compact('applications', 'advisers'));
    }

    public function viewDetails($id){

        $application = DB::table('org_applications')->where('id', $id)->get();
    
        $adviser = DB::table('users')->where('id', $application[0]->faculty_id)->get();

   
        return view('/tabs/viewDetails', compact('application', 'adviser'));
    }

    public function approve($applicationId, Request $request){

        $user = auth()->user();

        $dateTime = Carbon::now()->setTimezone('Asia/Manila')->format('y-m-d H:i');

        $application = DB::table('org_applications')->where('id', $applicationId)->get();

        $presidentId = DB::table('users')->where('email', $application[0]->presidentEmail)->get();


        $orgData = [['orgName' => $application[0]->proposedOrgName, 'created_at' => $dateTime]];
        DB::table('organizations')->insert($orgData);

        $org = DB::table('organizations')->where('orgName', $application[0]->proposedOrgName)->get();

        $insertAdviser = [['user_id' => $application[0]->faculty_id, 'organization_id' => $org[0]->id, 'position' => 'Adviser', 'created_at' => $dateTime]];

        $insertPresident = [['user_id' => $presidentId[0]->id, 'organization_id' => $org[0]->id, 'position' => 'President', 'created_at' => $dateTime]];

        DB::table('organization_user')->insert($insertAdviser);

        DB::table('organization_user')->insert($insertPresident);

        DB::table('org_applications')->where('id', $application[0]->id)->delete();


        //Email of the Applicant
        Mail::to('mericahuerta@student.apc.edu.ph')->send(new notificationOrgApprovedEmail());

        return redirect('home');
    }

    public function deny($applicationId){

        $application = DB::table('org_applications')->where('id', $applicationId)->delete();

        return redirect('home');
        
    }

    
}
